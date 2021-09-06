<?php

namespace App\Http\Controllers;

use App\Models\BookRequest;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Resources\BookRequest as BookRequestResource;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Okami101\LaravelAdmin\Filters\SearchFilter;
use Carbon\Carbon;
use Auth;

class BookRequestController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(BookRequest::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {   
        $user = Auth::user();
        if(!$user->hasRole("admin"))
        {
            $query = QueryBuilder::for(BookRequest::where('user_id', Auth::id()));
        }
        if($user->hasRole("admin"))
        {
            $query = QueryBuilder::for(BookRequest::class);
        }
        return BookRequestResource::collection(
            // QueryBuilder::for(BookRequest::class)
            $query->allowedFilters([
                    AllowedFilter::custom('q', new SearchFilter(['book_id', 'user_id', 'request_date', 'return_date'])),
                    AllowedFilter::exact('id'),  
                    AllowedFilter::exact('title'),                  
                    AllowedFilter::exact('books'),
                    AllowedFilter::exact('users')
                ])
                ->allowedSorts(['request_date', 'status', 'return_date'])
                ->allowedIncludes(['book', 'user'])
                ->exportOrPaginate()
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BookRequest  $bookRequest
     * @return BookRequestResource
     */
    public function show(BookRequest $bookRequest)
    {
        return new BookRequestResource($bookRequest->load(['book', 'user']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return BookRequestResource
     */
    public function store(StoreBookRequest $request)
    {   
        $user = Auth::user();
        $input = $request->all();
        if($user->hasRole("subscriber"))
        {
            $input["user_id"] = Auth::id();
            $input['request_date'] = Carbon::now();
        }        
        $bookRequest = BookRequest::create($input);

        return new BookRequestResource($bookRequest);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BookRequest  $bookRequest
     * @return BookRequestResource
     */
    public function update(UpdateBookRequest $request, BookRequest $bookRequest)
    {
        $bookRequest->update($request->all());

        return new BookRequestResource($bookRequest);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookRequest  $bookRequest
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(BookRequest $bookRequest)
    {
        $bookRequest->delete();

        return response()->noContent();
    }
}
