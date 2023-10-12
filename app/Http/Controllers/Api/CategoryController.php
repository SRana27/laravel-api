<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
//use App\Http\Resources\CategoryResource;
//use App\Http\Resources\ErrorResource;
use App\Http\Resources\SuccessResource;
use App\Models\Category;
//use http\Env\Response;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use DB;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        $categories = Category::get();

        return (new SuccessResource(['message' => 'All Category', 'data' => $categories]))->response()->setStatusCode(200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request)
    {
        $form_data = $request->validated();
        $form_data['slug'] = Str::slug($form_data['name']);

        $category = Category::create($form_data);

        return (new SuccessResource(['message' => 'successfully category created', 'data' => $category]))->response()->setStatusCode(201);

    }


    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
          /** return data formated by CategoryResource than go SuccessResource as a parameters and display;  */
//        $formatdata['data']=new CategoryResource($category);
//         return (new SuccessResource($formatdata))->response()->setStatusCode(200);
      return (new SuccessResource(['data' => $category]))->response()->setStatusCode(200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $form_data = $request->validated();
        $form_data['slug'] = Str::slug($form_data['name']);
        $category->update($form_data);
        return (new SuccessResource(['message' => 'successfully category updated','data'=>$category]))->response()->setStatusCode(200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {

        $category->delete();
        return (new SuccessResource(['message' => 'successfully category deleted']))->response()->setStatusCode(200);

    }

}





               /** Row Code with out api resource */
//
//        public function index()
//    {
//     $categories = Category::latest()->get();
//
//     return response()->json([
//         'status'=>200,
//         'message'=>'successful data get',
//         'date'=>$categories,
//     ]);
//        return(new CategoryResource($categories))->response()->setStatusCode(200);
//    }
//
//    public function store(Request $request)
//    {
//        $data =Validator::make($request->all(),[
//            'name'=>'required|string|unique:categories',
//
//        ]);
//
//        if($data->fails())
//        {
//            return response()->json([
//                'success'=>'false',
//                'message'=>'error',
//                'error'=>$data->getMessageBag(),
//            ],422);
//
//            return (new ErrorResource($data->getMessageBag()))->response()->setStatusCode(422);
//
//        }
//        $form_data =$data->validated();
//        $form_data['slug'] =Str::slug($form_data['name']);
//
//        $category= Category::create($form_data);
//
//        return response()->json([
//            'success'=>'ture',
//            'message'=>'successfully category created',
//            'data'=>$category,
//        ],201);
//
//        return (new SuccessResource(['message'=>'successfully category created']))->response()->setStatusCode(201);
//
//    }
//    public function show(Category $category)
//    {
//  //      public function show($string $id){
//  //    $category=Category::find($id);
//
//      if(!$category)
//      { return response()->json([
//          'success'=>'false',
//          'message'=>'error',
//          'data'=> 'data not found',
//      ],422);
//      }
//        return response()->json([
//            'success'=>'ture',
//            'message'=>'category found',
//            'data'=>$category,
//        ]);
//
//        return (new CategoryResource($category))->response()->setStatusCode(200);
//
//    }
//
//public function destroy(Category $category){
//
////    {$category=Category::find($id);
////        if(!$category)
////        { return response()->json([
////            'success'=>'false',
////            'message'=>'error',
////            'data'=> 'data not found',
////        ],422);
////        }
//
//    $category->delete();
//
////        return response()->json([
////        'success'=>'ture',
////        'message'=>'successfully category deleted',
//
////    ]);
//
//    return (new SuccessResource(['message'=>'successfully category deleted']))->response()->setStatusCode(200);
//
//}
//}




