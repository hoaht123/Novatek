<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slider = new Slider();
        $slider->name = $request->name;
        $slider->description = $request->description;
        $slider->product_id = $request->product_id;
        $get_image = $request->file('image');
        if($get_image == true){
            //main
            $image = $get_image->getClientOriginalName();// lấy tên file
            $name_image = current(explode('.',$image));// cắt tên file thành nhiều phần tử, lấy phần tử đầu
            $get_extension = explode('.',$image);// cắt tên file thành nhiều phần tử, lấy phần tử cuối
            $extension = end($get_extension);
            $extensionChange = strtolower($extension);
            $extensionArray = ['jpg','jpeg','gif','tiff','psb','eps','png','jfif'];
            if(in_array($extensionChange,$extensionArray)){
                $new_name = $name_image.'_'.time().'.'.$extensionChange;
                $path = 'images/sliders/';
                $get_image->move($path,$new_name);
                $slider->image = $new_name;
                $slider->save();
                return redirect()->route('slider.index')->with('message','Created successfully');
        }
            else{
                return redirect()->route('slider.create')->with('message','File extension not allowed');
            }
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('admin.slider.edit', compact('slider'));   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $slider = Slider::find($request->id);
        $slider->name = $request->name;
        $slider->description = $request->description;
        $slider->product_id = $request->product_id;

        $get_image = $request->file('image');
        if($get_image == true){
            //main
            $image = $get_image->getClientOriginalName();// lấy tên file
            $name_image = current(explode('.',$image));// cắt tên file thành nhiều phần tử, lấy phần tử đầu
            $get_extension = explode('.',$image);// cắt tên file thành nhiều phần tử, lấy phần tử cuối
            $extension = end($get_extension);
            $extensionChange = strtolower($extension);
            $extensionArray = ['jpg','jpeg','gif','tiff','psb','eps','png','jfif'];
            if(in_array($extensionChange,$extensionArray)){
                $new_name = $name_image.'_'.time().'.'.$extensionChange;
                $path = 'images/sliders/';
                $get_image->move($path,$new_name);
                $slider->image = $new_name;
                $slider->save();
                return redirect()->route('slider.index')->with('message','Update successfully');
        }
            else{
                return redirect()->route('slider.update')->with('message','File extension not allowed');
            }
        }
        $slider->save();
        return redirect()->route('slider.index')->with('message','Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);
        $slider->delete();

        return redirect()->route('slider.index')->with('message', 'Slider deleted successfully');
    }
}
