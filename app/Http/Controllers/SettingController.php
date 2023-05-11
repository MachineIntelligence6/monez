<?php

namespace App\Http\Controllers;

use App\Advertiser;
use App\CustomMessage;
use App\Drafts;
use App\Newsletter;
use App\Mail\Newslettermail;
use App\Notification;
use App\Notifications\CustomMessage as NotificationsCustomMessage;
use App\Publisher;
use console;
use App\Setting;
use App\SearchPath;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Notifications\Notifiable;
use App\Notifications\NewsletterNotification;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
// use Symfony\Component\Console\Input\Input;
use Symfony\Component\HttpFoundation\Session\Session;

use function GuzzleHttp\Promise\all;

// use Session;

class SettingController extends Controller
{


    public function index()
    {
        $publishers = Publisher::all();
        $advertisers = Advertiser::all();
        $custommessages = CustomMessage::all();
        $jsonData = json_encode(['publishers' => $publishers, 'advertisers' => $advertisers, 'custommessages' => $custommessages]);

        return view('settings.index', compact('publishers', 'advertisers', 'custommessages'), ['jsonData' => $jsonData]);

        // return view("settings.index",compact('publishers','advertisers'));
    }

    public function financialYear(Request $request)
    {
        // dd('it is financialYear');
        return view('crm.settings.financialYear');
    }

    public function dateFormat()
    {
        return view('crm.settings.dateFormat');
    }

    public function language()
    {
        return view('crm.settings.language');
    }

    public function timezone()
    {
        return view('crm.settings.timezone');
    }

    public function searchpath()
    {
        $links = SearchPath::where('user_id', 1)->get();
        return view('crm.settings.searchpath', compact('links'));
    }

    private $def;

    public function searchPathStore(Request $request)
    {
        $userId = Auth::user()->id;
        $def = SearchPath::where('isDefault', '=', 1)
            ->where('user_Id', '=', $userId)
            ->first();
        if ($def = null) {
            return redirect()->back()->with('error', 'You are not allowed to set more than one link default');
        } else {
            $request->validate([
                'link' => 'required|unique:searchpaths|max:255',
            ]);
            $sp = new SearchPath;
            $sp->user_id = $userId;
            $sp->link = $request->link;
            $sp->isDefault = $request->isDefault;
            $sp->save();
            return redirect()->back()->with('success', 'Your link saved successfully.');
        }
    }

    public function searchpathUpDate(Request $request, SearchPath $searchpath)
    {
        // dd($request->id);
        // dd($request->all(), $request->id, $searchpath->all(), $searchpath->first()->id);
        SearchPath::where('user_id', '=', $searchpath->first()->id)
            ->update([
                'isDefault' => 0
            ]);
        SearchPath::where('id', '=', $request->id)
            ->update([
                'isDefault' => 1
            ]);
        return redirect()->back()->with('success', 'Your link updated successfully.');
    }

    public function custummessage()
    {
        return view('crm.settings.custummessage');
    }

    public function storeCustomMessage(Request $request)
    {
        // dd('test');
        try {

            // dd('test',$request->input('msg_custom_users'));
            $validatedData = $request->validate([
                'parteners' => 'required',
                'message'  => 'required',
            ]);

            $message = new CustomMessage;
            $messagerecipient_type = $request->parteners;
            $message->message = $request->message;
            if ($messagerecipient_type === 'publishers' || $messagerecipient_type === 'advertisers' || $messagerecipient_type === 'all') {
                // dd($messagerecipient_type);
                $message->recipient_type = $request->parteners;
                $message->recipient_ids = $request->parteners;

                switch ($message->recipient_type) {
                    case 'publishers':
                        foreach (\App\Publisher::all() as $key => $user) {
                            $user->notify(new NotificationsCustomMessage($request->message));
                        }
                        break;
                    case 'advertisers':
                        foreach (\App\Advertiser::all() as $key => $user) {
                            $user->notify(new NotificationsCustomMessage($request->message));
                        }
                        break;
                    case 'all':
                        foreach (\App\Advertiser::all() as $key => $user) {
                            $user->notify(new NotificationsCustomMessage($request->message));
                        }
                        foreach (\App\Publisher::all() as $key => $user) {
                            $user->notify(new NotificationsCustomMessage($request->message));
                        }
                        break;

                    default:
                        # code...
                        break;
                }
            } else {
                // dd($messagerecipient_type,'custom');
                $message->recipient_type = 'custom';
                $customUsers = $request->input('msg_custom_users');
                $ids = [];
                foreach ($customUsers as $customUser) {
                    $parts = explode('_', $customUser);
                    if ($parts[0] === 'p') {
                        $ids[] = 'p_' . $parts[1];
                        Publisher::find($parts[1])->notify(new NotificationsCustomMessage($request->message));
                    } elseif ($parts[0] === 'a') {
                        $ids[] = 'a_' . $parts[1];
                        Advertiser::find($parts[1])->notify(new NotificationsCustomMessage($request->message));
                    }
                }
                $idString = implode(',', $ids);
                // dd($idString);
                $message->recipient_ids = $idString;
            }
            $message->save();

            return redirect()->route('custommessage.view');
        } catch (\Exception $e) {
            // Log the error
            Log::error($e->getMessage());

            // Return a redirect response with error message
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function updateCustomMessage(Request $request, CustomMessage $customMessage)
    {
        // dd('test',$request->input('msg_custom_users'));
        $validatedData = $request->validate([
            'message'  => 'required',
        ]);

        $customMessage->message = $request->message;
        $messagerecipient_type = $request->parteners;
        $customMessage->message = $request->message;
        switch ($messagerecipient_type) {
            case 'publishers':
                foreach (\App\Publisher::all() as $key => $user) {
                    $user->notify(new NotificationsCustomMessage($request->message));
                }
                break;
            case 'advertisers':
                foreach (\App\Advertiser::all() as $key => $user) {
                    $user->notify(new NotificationsCustomMessage($request->message));
                }
                break;
            case 'all':
                foreach (\App\Advertiser::all() as $key => $user) {
                    $user->notify(new NotificationsCustomMessage($request->message));
                }
                foreach (\App\Publisher::all() as $key => $user) {
                    $user->notify(new NotificationsCustomMessage($request->message));
                }
                break;

            default:
                # code...
                break;
        }
        if ($messagerecipient_type === 'publishers' || $messagerecipient_type === 'advertisers' || $messagerecipient_type === 'all') {
            // dd($messagerecipient_type);
            $customMessage->recipient_type = $request->parteners;
            $customMessage->recipient_ids = $request->parteners;
        } else {
            // dd($messagerecipient_type,'custom');
            $customMessage->recipient_type = 'custom';
            $customUsers = $request->input('msg_custom_users');
            $ids = [];
            foreach ($customUsers as $customUser) {
                $parts = explode('_', $customUser);
                if ($parts[0] === 'p') {
                    $ids[] = 'p_' . $parts[1];
                    Publisher::find($parts[1])->notify(new NotificationsCustomMessage($request->message));
                } elseif ($parts[0] === 'a') {
                    $ids[] = 'a_' . $parts[1];
                    Advertiser::find($parts[1])->notify(new NotificationsCustomMessage($request->message));
                }
            }
            $idString = implode(',', $ids);
            // dd($idString);
            $customMessage->recipient_ids = $idString;
        }
        // dd($customMessage);
        $customMessage->update();
        return redirect()->back()->withErrors(['success' => 'Message Updated']);
    }

    public function newsletters()
    {
        return view('crm.settings.newsletters');
    }

    public function sendNewsletter(Request $request)
    {
        // return $request;
        $subject = $request->subject;
        $body = $request->content;
        $messagerecipient_type = $request->parteners;

        $publishers = [];
        $advertisers = [];

        switch ($messagerecipient_type) {
            case 'all':
                $advertisers = Advertiser::all();
                $publishers = Publisher::all();
                break;
            case 'publishers':
                $publishers = Publisher::all();
                break;
            case 'advertisers':
                $advertisers = Advertiser::all();
                break;
            case 'select-custom':
                if ($request->has('custom_advertisers')) {
                    $advertisers = Advertiser::whereIn('id', $request->custom_advertisers)->get();
                }
                if ($request->has('custom_publishers')) {
                    $publishers = Publisher::whereIn('id', $request->custom_publishers)->get();
                }
                break;
            default:
                # code...
                break;
        }

        // return $advertisers;
        // if ($messagerecipient_type === 'publishers' || $messagerecipient_type === 'advertisers' || $messagerecipient_type === 'all') {
        //     // dd($messagerecipient_type);
        //     $messagerecipient_type = $request->parteners;
        //     $recipient_ids = null;
        //     if ($messagerecipient_type === 'all') {
        //         $advertisers = Advertiser::all();
        //         $publishers = Publisher::all();
        //         $advertiserIds = $advertisers->pluck('id')->all();
        //         $publisherIds = $publishers->pluck('id')->all();

        //         $advertiserEmails = $advertisers->pluck('accEmail')->all();
        //         $publisherEmails = $publishers->pluck('accEmail')->all();
        //         $recipientEmails = array_merge($advertiserEmails, $publisherEmails);

        //         $ids = array_merge($advertiserIds, $publisherIds);
        //         $recipient_ids = $ids;
        //         // dd($recipientEmails,$recipient_ids);
        //     } elseif ($messagerecipient_type == 'publishers') {
        //         $publishers = Publisher::all();
        //         $publisherIds = $publishers->pluck('id')->all();
        //         $recipient_ids = $publisherIds;
        //         $publisherEmails = $publishers->pluck('accEmail')->all();
        //         $recipientEmails =  $publisherEmails;
        //         // dd($recipient_ids,$recipientEmails);
        //     } else {
        //         $advertisers = Advertiser::all();
        //         $advertiserIds = $advertisers->pluck('id')->all();
        //         $recipient_ids = $advertiserIds;
        //         $advertiserEmails = $advertisers->pluck('accEmail')->all();
        //         $recipientEmails = $advertiserEmails;
        //         // dd($recipient_ids,$recipientEmails);
        //     }
        // } else {
        //     // dd($messagerecipient_type,'custom');
        //     $messagerecipient_type = 'custom';
        //     $customUsers = $request->input('custom_users');
        //     $pub_ids = [];
        //     $adv_ids = [];
        //     foreach ($customUsers as $customUser) {
        //         $parts = explode('_', $customUser);
        //         if ($parts[0] === 'p') {
        //             $pub_ids[] =  $parts[1];
        //         } elseif ($parts[0] === 'a') {
        //             $adv_ids[] =  $parts[1];
        //         }
        //     }
        //     $publishers = Publisher::whereIn('id', $pub_ids)->get();

        //     $publisherEmails = $publishers->pluck('accEmail')->all();
        //     // dd($pub_ids,$publisherEmails);
        //     $advertisers = Advertiser::whereIn('id', $adv_ids)->get();

        //     $advertiserEmails = $advertisers->pluck('accEmail')->all();
        //     // dd($adv_ids,$advertiserEmails);
        //     $recipientEmails = array_merge($advertiserEmails, $publisherEmails);
        //     //  $idString = implode(',', $ids);
        //     // dd($emails);
        //     // $recipient_ids = $idString;
        // }

        preg_match_all('/data:image\/(.*?);base64,(.*)|https?:\/\/\S+\.(?:jpg|jpeg|gif|png)/i', $body, $imageMatches);
        preg_match_all('/data:video\/(.*?);base64,(.*)|https?:\/\/\S+\.(?:mp4|avi|mov|wmv)/i', $body, $videoMatches);

        $imageAttachments = [];
        $videoAttachments = [];

        foreach ($imageMatches[0] as $key => $match) {
            if (!empty($imageMatches[2][$key])) {
                // Matched base64-encoded image data
                $type = $imageMatches[1][$key];
                $data = base64_decode($imageMatches[2][$key]);
                $filename = 'image_' . $key . '.' . $type;
                $imageAttachments[] = [
                    'data' => $data,
                    'name' => $filename,
                ];
            } else {
                $url = $match;
            }
        }

        foreach ($videoMatches[0] as $key => $match) {
            if (!empty($videoMatches[2][$key])) {
                $type = $videoMatches[1][$key];
                $data = base64_decode($videoMatches[2][$key]);
                $filename = 'video_' . $key . '.' . $type;
                $videoAttachments[] = [
                    'data' => $data,
                    'name' => $filename,
                ];
            } else {
                $url = $match;
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $videoData = curl_exec($ch);
                $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                curl_close($ch);

                if ($httpCode !== 200) {
                    continue;
                }

                $type = pathinfo($url, PATHINFO_EXTENSION);
                $data = $videoData;
                $filename = 'video_' . $key . '.' . $type;
                $videoAttachments[] = [
                    'data' => $data,
                    'name' => $filename,
                ];
            }
        }


        $mailData = [
            "subject" => $subject,
            "body" => $body
        ];
        $imageAttachments = null;
        $videoAttachments = null;
        foreach ($advertisers as $recipientEmail) {
            Mail::to($recipientEmail->account_email)->send(new Newslettermail($mailData, $body, $imageAttachments, $videoAttachments));
        }
        return redirect()->back();
    }

    public function notifications()
    {
        return view('crm.settings.notifications');
    }

    public function storeNotification(Request $request)
    {
        try {
            // dd('test');
            $validatedData = $request->validate([
                'parteners' => 'required',
                'requestType' => 'required',

            ]);

            $notification = new Notification;
            $notificationrecipient_type = $request->parteners;
            $notificationdoc_type = $request->requestType;

            if ($notificationrecipient_type === 'publishers' || $notificationrecipient_type === 'advertisers' || $notificationrecipient_type === 'all') {
                // dd($notificationrecipient_type);
                $notification->recipient_type = $request->parteners;
                $notification->recipient_ids = $request->parteners;
                //in fetching time we have to fetch all the advertisers and publishers thats why here the recipient_ids is null
            } else {
                // dd($notificationrecipient_type,'custom');
                $notification->recipient_type = 'custom';
                $customUsers = $request->input('custom_users');
                $ids = [];
                foreach ($customUsers as $customUser) {
                    $parts = explode('_', $customUser);
                    if ($parts[0] === 'p') {
                        $ids[] = 'p_' . $parts[1];
                    } elseif ($parts[0] === 'a') {
                        $ids[] = 'a_' . $parts[1];
                    }
                }
                $idString = implode(',', $ids);
                // dd($idString);
                $notification->recipient_ids = $idString;
            }
            if ($notificationdoc_type != "ios") {
                $notification->files = $request->document_name;
            } else {
                $notification->files = null;
            }
            // dd($notificationrecipient_type,$notificationdoc_type,$notification->files);
            $notification->doc_type = $notificationdoc_type;
            // dd($notificationrecipient_type,$notification->doc_type,$notification->files);
            $notification->save();
            return redirect()->route('settings.index');
        } catch (\Throwable $th) {
            error_log($th->getMessage());
            return response()->json(['succeed' => 'false']);
        }
    }

    public function updateNotification(Request $request, CustomMessage $customMessage)
    {
        $validatedData = $request->validate([
            'message'  => 'required',
        ]);

        $customMessage->message = $request->message;
        $messagerecipient_type = $request->parteners;
        $customMessage->message = $request->message;
        if ($messagerecipient_type === 'publishers' || $messagerecipient_type === 'advertisers' || $messagerecipient_type === 'all') {
            // dd($messagerecipient_type);
            $customMessage->recipient_type = $request->parteners;
            $customMessage->recipient_ids = null;
        } else {
            // dd($messagerecipient_type,'custom');
            $customMessage->recipient_type = 'custom';
            $customUsers = $request->input('custom_users');
            $ids = [];
            foreach ($customUsers as $customUser) {
                $parts = explode('_', $customUser);
                if ($parts[0] === 'p') {
                    $ids[] = 'p_' . $parts[1];
                } elseif ($parts[0] === 'a') {
                    $ids[] = 'a_' . $parts[1];
                }
            }
            $idString = implode(',', $ids);
            // dd($idString);
            $customMessage->recipient_ids = $idString;
        }
        // dd($customMessage);
        $customMessage->update();
        return redirect()->route('settings.index');
    }

    public function destroycustommessage(CustomMessage $customMessage)
    {
        if ($customMessage) {

            // dd($customMessage,$customMessage->id);
            $customMessage->delete();
            return response()->json(['status' => 'success']);
            // return redirect()->route('settings.index');
        }
    }


    public function notificationIndex()

    {
        $publishers = Publisher::all();
        $advertisers = Advertiser::all();
        $custommessages = CustomMessage::all();
        $jsonData = json_encode(['publishers' => $publishers, 'advertisers' => $advertisers, 'custommessages' => $custommessages]);

        return view('settings.notifications', compact('publishers', 'advertisers', 'custommessages'), ['jsonData' => $jsonData]);
        // return view('settings.notifications');
    }
    public function newsletterIndex()
    {
        $publishers = Publisher::all();
        $advertisers = Advertiser::all();
        $custommessages = CustomMessage::all();
        $jsonData = json_encode(['publishers' => $publishers, 'advertisers' => $advertisers, 'custommessages' => $custommessages]);

        return view('settings.newsletters', compact('publishers', 'advertisers', 'custommessages'), ['jsonData' => $jsonData]);
        // return view('settings.newsletters');
    }
    public function custommessageIndex()
    {
        $publishers = Publisher::all();
        $advertisers = Advertiser::all();
        $custommessages = CustomMessage::all();
        $jsonData = json_encode(['publishers' => $publishers, 'advertisers' => $advertisers, 'custommessages' => $custommessages]);

        return view('settings.custommessage', compact('publishers', 'advertisers', 'custommessages'), ['jsonData' => $jsonData]);
        // return view('settings.custommessage');
    }
    public function draftsIndex()
    {
        $draftfile = Drafts::orderBy('created_at', 'desc')->first();
        // dd($draftfile);
        return view('settings.drafts', compact('draftfile'));
    }
    public function storeDrafts(Request $request)
    {
        $draft = Drafts::orderBy('created_at', 'desc')->first();
        if ($draft) {
            // dd('test',$draft);
            $updatedraft = Drafts::orderBy('created_at', 'desc')->first();
            if ($request->hasfile('io')) {
                $file = $request->file('io');
                $name = $file->storeAs('public/files/drafts','io.pdf');
                // $named = $file->getClientOriginalName();
                // $name = 'io.' . $file->getClientOriginalExtension();
                // // Check if a file with the same name already exists
                // if (file_exists(public_path('assets/files/uploads/drafts/io/' . $name))) {
                //     // Delete the existing file
                //     // dd('delete');
                //     unlink(public_path('assets/files/uploads/drafts/io/' . $name));
                // }
                // $file->move(public_path('assets/files/uploads/drafts/io/'), $name);
            }
            // dd($name);
            $updatedraft->io_filenames = json_encode($name);
            $updatedraft->update();
            // dd($updatedraft);
        }else{
            if ($request->hasfile('io')) {
                $file = $request->file('io');
                $name = 'io' . '.' . $file->getClientOriginalExtension();
                $named = str_replace('"', '', $name);
                // $named = $file->getClientOriginalName();
                // dd('named',$named);
                $file->move(public_path() . '/assets/files/uploads/drafts/io/', $name);
                // $data[] = $name;
            }


            // dd($name);
            $draft = new Drafts();
            $draft->io_filenames = json_encode($name);
            $draft->save();
        }
        return redirect()->route('drafts.view');
    }
    public function submitDraftForm(Request $request)
    {
        $draft = Drafts::orderBy('created_at', 'desc')->first();

        if ($draft) {
            // Redirect to update route
            return redirect()->route('update.drafts', $draft->id);
        } else {
            // Redirect to store route
            return redirect()->route('store.drafts');
        }
    }
    public function updateDrafts(Request $request, $id)
    {
        $draft = Drafts::where('id', $id)->first();

        if ($request->hasfile('io')) {
            $file = $request->file('io');
            $name = 'draftIO.' . $file->getClientOriginalExtension();

            // Check if a file with the same name already exists
            if (file_exists(public_path('assets/files/uploads/drafts/io/' . $name))) {
                // Delete the existing file
                unlink(public_path('assets/files/uploads/drafts/io/' . $name));
            }

            $file->move(public_path('assets/files/uploads/drafts/io/'), $name);
        }


        // dd($name);
        // $draft = new Drafts();
        $draft->io_filenames = json_encode($name);
        $draft->update();
        return redirect()->route('drafts.view');
    }
    public function DownloadDraftPdf(Request $request, $name)
    {
        // dd($name);
        $filePath = asset('storage/files/drafts/' . $name);
        // dd($filePath);
        return Storage::download('public/files/drafts/' . $name);
    }

    public function markCustomMessageRead($id){
        $notification = DatabaseNotification::find($id);
        if($notification) {
            $notification->markAsRead();
        }
    }
}
