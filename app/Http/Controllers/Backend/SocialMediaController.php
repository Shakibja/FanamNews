<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\SocialLink;
use App\Models\Backend\SiteSettings;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class SocialMediaController extends Controller
{
    public function index() 
    {
        $admin = Auth::guard('admin')->user();
        $social_media = SocialLink::orderBy('id', 'asc')->get();
        return view('backend.pages.socialmedia.index', compact("social_media","admin"));
    }

    public function store(Request $request)
    {
        $social_media_store = new SocialLink();

        $social_media_store->social_name = $request->social_name;
        $social_media_store->social_link = $request->social_link;
        $social_media_store->social_url = $request->social_url;
        $social_media_store->social_status = $request->social_status;

        $social_media_store->save();
        return back()->with('social_media_success', 'Added Successfully !');

        
    }

    public function edit($id)
    {
        $admin = Auth::guard('admin')->user();
        $social_medias = SocialLink::where('id', $id)->first();
        $social_media = SocialLink::orderBy('id', 'asc')->get();
        return view('backend.pages.socialmedia.index', compact('social_medias', 'social_media','admin'));
    }

    public function update(Request $request, $id){
        $social_media_update = SocialLink::where('id', $id)->first();
        
        $social_media_update->social_name = $request->social_name;
        $social_media_update->social_link = $request->social_link;
        $social_media_update->social_url = $request->social_url;
        $social_media_update->social_status = $request->social_status;
        $social_media_update->update();
        return back()->with('social_media_success', 'Update Successfully !');


    }

    public function siteSettings() 
    {
        $admin = Auth::guard('admin')->user();
        return view('backend.pages.socialmedia.site_settings.index', compact("admin"));
    }

    public function siteSettingsStore(Request $request)
    {
        $site_settings_store = new SiteSettings();

        $site_settings_store->site_title = $request->site_title;
        $site_settings_store->meta_title = $request->meta_title;
        if (!empty($request->file('header_logo'))) {
            $image = $request->file('header_logo');
            $imageName = rand(1000,9999) . '.' . $image->extension();
            $image->move(public_path('backend/images/site_settings/'), $imageName);
            $site_settings_store->header_logo = $imageName;
        }

        if (!empty($request->file('favicon'))) {
            $image = $request->file('favicon');
            $imageName = rand(1000,9999) . '.' . $image->extension();
            $image->move(public_path('backend/images/site_settings/'), $imageName);
            $site_settings_store->favicon = $imageName;
        }
        $site_settings_store->editor_name = $request->editor_name;
        $site_settings_store->phone_number = $request->phone_number;
        $site_settings_store->email = $request->email;
        $site_settings_store->address = $request->address;
        $site_settings_store->copyright = $request->copyright;

        $site_settings_store->save();
        return back()->with('site_settings_success', 'Added Successfully !');
        
    }

    // Edit Page
    public function siteSettingsEdit($id){
        $admin = Auth::guard('admin')->user();
        $site_set = SiteSettings::where('id', $id)->first();
        return view('backend.pages.socialmedia.site_settings.index', compact('site_set','admin'));
    }


    public function siteSettingsUpdate(Request $request, $id){
        $site_settings_update = SiteSettings::where('id', $id)->first();

        $site_settings_update->site_title = $request->site_title;
        $site_settings_update->meta_title = $request->meta_title;

        if (!empty($request->file('header_logo'))) {
            if(File::exists('backend/images/site_settings/'.$site_settings_update->header_logo)){
                File::delete('backend/images/site_settings/'.$site_settings_update->header_logo);
            }
            $image = $request->file('header_logo');
            $imageName = rand(1000,9999) . '.' . $image->extension();
            $image->move(public_path('backend/images/site_settings/'), $imageName);
            $site_settings_update->header_logo = $imageName;
        }

        if (!empty($request->file('favicon'))) {
            if(File::exists('backend/images/site_settings/'.$site_settings_update->favicon)){
                File::delete('backend/images/site_settings/'.$site_settings_update->favicon);
            }
            $image = $request->file('favicon');
            $imageName = rand(1000,9999) . '.' . $image->extension();
            $image->move(public_path('backend/images/site_settings/'), $imageName);
            $site_settings_update->favicon = $imageName;
        }

        $site_settings_update->editor_name = $request->editor_name;
        $site_settings_update->phone_number = $request->phone_number;
        $site_settings_update->email = $request->email;
        $site_settings_update->address = $request->address;
        $site_settings_update->copyright = $request->copyright;
        $site_settings_update->update();
        return back()->with('site_settings_success', 'Update Successfully !');


    }
}
