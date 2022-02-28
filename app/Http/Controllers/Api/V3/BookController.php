<?php

namespace App\Http\Controllers\Api\V3;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Resources\V3\BookResource;
use App\Http\Controllers\Api\ElasticController as Elastic;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd("llega la petición");
        return \json_encode(['llega la petición']);
        //return BookResource::collection(Book::latest()->paginate());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        dd("llega la petición");
        return new BookResource($book);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        if( $book->delete() )  {
            return response()->json([
                'message' => 'Success'
            ],204);
        }
        return  response()->json([
            'message' => 'Not found'
        ],404);
    }
   
    
}
