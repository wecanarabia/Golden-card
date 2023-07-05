<?php

namespace App\Http\Controllers\Dash;

use App\Models\Service;
use App\Models\ImageService;
use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dash\ServiceImageRequest;

class ServiceImageController extends Controller
{

    protected $auth;
    public function __construct(AuthService $auth)
    {
        $this->auth=$auth;
        $this->middleware('can:view')->only(["index","show"]);
        $this->middleware('can:control')->only(["create","store","sort","destroy"]);
    }

         /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $service = Service::findOrFail($this->auth->service());
        $data = ImageService::latest()->whereBelongsTo($service)->paginate(10);
        return view('dash.service-images.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('dash.service-images.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceImageRequest $request)
    {
        $request['service_id']=$this->auth->service();
        if(ImageService::where('service_id',$request->service_id)->count()<5){

        foreach($request->images as $image) {
            if(ImageService::where('service_id',$request->service_id)->count()<5){
                if (ImageService::where('service_id',$request->service_id)->count()==0) {
                    $order = 1;
                }else{
                    $order = ImageService::where('service_id',$request->service_id)->max('order')+1;
                }
                ImageService::create([
                    'image'=>$image,
                    'order'=>$order,
                    'service_id'=>$request->service_id,
                ]);
            }elseif(ImageService::where('service_id',$request->service_id)->count()==5){
                return redirect()->route('dash.images.index')
                    ->with('success','Images has been added successfully');
            }
        }
        return redirect()->route('dash.images.index')
                        ->with('success','Images has been added successfully');
        }else{
            return redirect()->back()
                        ->with('info','Maximum allowed number of images is 5 images');

        };
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Service $service)
    // {
    //     if ($service->id != $this->auth->service()) {
    //         return abort('404');
    //     }
    //     return view('dash.service-images.edit',compact('image','services'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(ServiceImageRequest $request, string $id)
    // {
    //     $image = ImageService::findOrFail($id);
    //     if($request->service_id!==$image->service_id&&ImageService::where('service_id',$request->service_id)->count()<=5){

    //     if ($request->has('image')&&$image->image  && File::exists($image->image)) {
    //         unlink($image->image);
    //     }
    //     $image->update($request->all());


    //     return redirect()->route('dash.service-images.index')
    //                     ->with('success','Service Image has been updated successfully');
    //     }else{
    //         return redirect()->back()
    //                     ->with('info','Maximum allowed number of images for service is 5 images');

    //     };
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        ImageService::where('service_id',$this->auth->service())->findOrFail($request->id)->delete();
        return redirect()->route('dash.images.index')->with('success','Service Image has been removed successfully');
    }

    public function sortData($id,$direction = 'up'){
        $model=ImageService::whereServiceId($this->auth->service())->findOrFail($id);
        switch ($direction) {
            case 'up':
                $this->sortProcess($model,$direction);
                break;
            case 'down':
                $this->sortProcess($model,$direction);
                break;
            default:
                break;
        }
        return redirect()->route('dash.images.index');
    }

    public function sortProcess($model,$direction)
    {
        $page = $model;
        $id = $model->id;
        if ($direction == 'up') {
            $order = $model->when($page->order, function ($query, $pageOrder) {
                return $query->where("order", '<', $pageOrder);
            })->orderBy('order','desc')->firstOrFail();
        } else {
            $order = $model->when($page->order, function ($query, $pageOrder) {
                return $query->where("order", '>', $pageOrder);
            })->orderBy('order','asc')->firstOrFail();
        }
        if ($order) {
            $page->where('id',$id)->update(['order'=>$order->order]);
            $order->where('id',$order->id)->update(['order'=>$page->order]);
            return TRUE;
        }
    }

}
