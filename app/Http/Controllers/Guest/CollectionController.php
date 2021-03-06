<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function index($slug = null, $id = null, Request $request){

        $productType = new \stdClass();
        $productType->id = '';
        $productType->product_type_name = "Tất cả sản phẩm";
        if($id != null){
            $productType = $this->productTypeService->findId($id);
        }
        $sortBy = null;
        if(isset($request->sort_by)) $sortBy = $request->sort_by;
        $searchInfo = $this->getSearchInfo($request, $productType);
        $products = $this->productService->getListProductByProductType($id,$sortBy,$searchInfo);
        return view('guest.collection.collection',[
            'products' => $products,
            'productType' => $productType,
            'sortBy' => $sortBy,
            'searchInfo' => $searchInfo
        ]);
    }

    private function getSearchInfo(Request $request, $productType){
        $searchInfo = new \StdClass();
        if(isset($request->product_type)){
            $searchInfo->product_type = $request->product_type;
        }else if(isset($productType->id)){
            $searchInfo->product_type = $productType->id;
            if(isset($productType->parent_id)){
                $searchInfo->product_type = $productType->parent_id;
            }
        }
        $searchInfo->product_price = "";
        if(isset($request->product_price)){
            $searchInfo->product_price = $request->product_price;
        }
        $searchInfo->product_fuel = "";
        if(isset($request->product_fuel)){
            $searchInfo->product_fuel = $request->product_fuel;
        }
        $searchInfo->product_number_of_seat = "";
        if(isset($request->product_number_of_seat)){
            $searchInfo->product_number_of_seat = $request->product_number_of_seat;
        }
        return $searchInfo;
    }

    public function search(Request $request){
        $products = [];
        if(isset($request->product_name)){
            $products = $this->productService->searchProductByName($request->product_name);
        }
        return view('guest.collection.search',[
            'products' => $products,
            'product_name' => $request->product_name
        ]);
    }
}
