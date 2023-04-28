<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;
use App\Events\UserRegistration;
use App\Models\Category;
use App\Models\City;
use App\Models\country;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function orders()
    {
        $orders = Order::where('status','active')->get();
        $categories = Category::all();
        return view('orders.all-orders' , compact('orders','categories'));
    }

    /**
     *
     * //add to fav table in order psges
     *
     *
     **/
    public function addFav($id)
    {
        $logged_in_user = Auth::user()->id;
        $fav = new Favorite();
        $fav->order_id = $id;
        $fav->user_id = $logged_in_user;
        $fav->save();
        return redirect()->back();
    }
    /**
     *
     * //delete from fav table in order psges
     *
     *
     **/
    public function deleteFav($id)
    {
        //    dd($id);
        DB::table('favorites')->where('order_id', $id)->delete();
        return redirect()->back();
    }
    /**
     *
     *
     * */
    public function myOrders()
    {
        // $myOrders = DB::table('orders')->where('user_id',auth()->id())->get();
        return view('orders.my-orders');
    }
    public function order_details($id)
    {
        // dd($id);
        $order=  DB::table('orders')->where('id', $id)->first();
        // dd($order);
        $user = DB::table('users')->where('id',$order->user_id)->first();
        // dd($user);
        $city = DB::table('cities')->where('id',$order->city_id)->first();
        // dd($city);
        $country = DB::table('countries')->where('id',$order->country_id)->first();
        // dd($country);
        $category = DB::table('categories')->where('id',$order->category_id)->first();
        // dd($category);
        // $comments = DB::table('comments')->where('order_id',$order->id)->get();

        // dd($comments);
        $comments = DB::table('comments')
        ->select('users.first_name', 'users.last_name', 'comments.comment', 'comments.created_at')
        ->leftjoin('users', 'comments.user_id', '=', 'users.id')
        ->join('orders', 'comments.order_id', '=', 'orders.id')
        ->where('comments.order_id', $id)
        ->get();
        // event(new UserRegistration($comments->comment));


    //    dd( $comment_users);
        return view('orders.order_details',compact('order' , 'user','city','country','category' ,'comments'));
    }
    public function create()
    {
        $countries = country::all();
        $cities = City::all();
        $categories = Category::all();
        return view('orders.create', compact('countries', 'categories', 'cities'));
    }
    public function store(Request $request)
    {
        // dd($request);

        $request->validate([
            'title' => 'required',
            'country' => 'required',
            'min_price' => 'required',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif',
        ]);
        // dd($request);
        $order = new Order();
        $order->title = $request->title;
        $order->description = $request->description;
        $order->city_id = $request->city;
        $order->country_id = $request->country;
        $order->min_price = $request->min_price;
        $order->max_price = $request->max_price;
        $order->status = 'active';
        $order->user_id = auth()->user()->id;
        $imagePath = '';
        if($request->image){
            $imagePath = $request->image->store('images', 'public');
        }
        $order->image = $imagePath;
        $order->category_id = $request->category_id;
        $order->save();
        return redirect()->route('orders.view')->with('message', 'success save');
    }
    // public function getCities($id){
    //     return City::where('country_id',$id)->get();
    // }
    public function cancelOrder(Order $order)
    {
        $order->status = 'canceled';
        $order->save();
        return redirect()->back()->with('message','order canceled successfully');
    }
    public function completeOrder(Order $order)
    {
        $order->status = 'completed';
        $order->save();
        return redirect()->back()->with('message','Order completed successfully');
    }
    public function reorder(Order $order)
    {
        $order->status = 'active';
        $order->save();
        return redirect()->back()->with('message','Order reordered successfully');
    }
    public function activeOrder()
    {
        return view('orders.active');
    }
    public function finishedOrder()
    {
        return view('orders.finished');
    }
    public function admin()
    {
        $category = Category::all();
        return view('admin.orders.index', ['category' => $category]);
    }
}
