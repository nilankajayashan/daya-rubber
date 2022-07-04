<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Employee;
use App\Models\Order;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request){
        $permissions = Employee::where('employee_id', '=', session()->get('auth_employee')->employee_id)->first();
        $permissions = $permissions->permissions;
        if (isset($request->state)){
            switch ($request->state){
                case 'dashboard':
                    $order_count = Order::count();
                    $product_count = Product::count();
                    $supplier_count = Supplier::count();
                    $customer_count = User::count();
                    $orders = Order::all();
                    return view('dashboard', ['state' => 'dashboard', 'permissions' => $permissions, 'order_count' => $order_count, 'product_count' => $product_count, 'supplier_count' => $supplier_count, 'customer_count' => $customer_count, 'orders' => $orders]);
                    break;
                case 'categories':
                    $categories = Category::all();
                    $employees = Employee::all();
                    return view('dashboard', ['state' => 'categories', 'permissions' => $permissions, 'categories' => $categories, 'employees' => $employees]);
                    break;
                case 'products':
                    $products = Product::all();
                    $categories = Category::all();
                    $suppliers = Supplier::all();
                    return view('dashboard', ['state' => 'products', 'permissions' => $permissions, 'products' => $products, 'categories' => $categories, 'suppliers' => $suppliers]);
                    break;
                case 'stocks':
                    $products = Product::all();
                    $categories = Category::all();
                    return view('dashboard', ['state' => 'stocks', 'permissions' => $permissions, 'products' => $products, 'categories' => $categories]);
                    break;
                case 'customers':
                    $users = User::all();
                    return view('dashboard', ['state' => 'customers', 'permissions' => $permissions, 'users' => $users]);
                    break;
                case 'suppliers':
                    $suppliers = Supplier::all();
                    return view('dashboard', ['state' => 'suppliers', 'permissions' => $permissions, 'suppliers' => $suppliers]);
                    break;

                case 'carts':
                    $carts = Cart::all();
                    $users = User::all();
                    $products = Product::all();
                    return view('dashboard', ['state' => 'carts', 'permissions' => $permissions, 'carts' => $carts, 'users' => $users, 'products' => $products]);
                    break;
                case 'orders':
                    $orders = Order::all();
                    $users = User::all();
                    return view('dashboard', ['state' => 'orders', 'permissions' => $permissions, 'orders' => $orders, 'users' => $users]);
                    break;
                case 'employees':
                    $employees = Employee::where('employee_id', '!=', session()->get('auth_employee')->employee_id)->get();
                    return view('dashboard', ['state' => 'employees', 'permissions' => $permissions, 'employees' => $employees]);
                    break;
                case 'my_account':
                    $my_details = Employee::where('employee_id', '=', session()->get('auth_employee')->employee_id)->first();
                    return view('dashboard', ['state' => 'my_account', 'permissions' => $permissions, 'my_details' => $my_details]);
                    break;
                case 'order_report':
                    $orders = Order::all();
                    return view('dashboard', ['state' => 'order_report', 'permissions' => $permissions, 'orders' => $orders]);
                    break;
                case 'payment_report':
                    $orders = Order::all();
                    return view('dashboard', ['state' => 'payment_report', 'permissions' => $permissions, 'orders' => $orders]);
                    break;
                default:
                    return view('dashboard', ['state' => 'dashboard', 'permissions' => $permissions]);
                    break;
            }

        }else{
            $order_count = Order::count();
            $product_count = Product::count();
            $supplier_count = Supplier::count();
            $customer_count = User::count();
            $orders = Order::all();
            return view('dashboard', ['state' => 'dashboard', 'permissions' => $permissions, 'order_count' => $order_count, 'product_count' => $product_count, 'supplier_count' => $supplier_count, 'customer_count' => $customer_count, 'orders' => $orders]);
        }
    }
}
