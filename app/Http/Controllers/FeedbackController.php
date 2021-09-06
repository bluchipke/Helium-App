<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Http\Requests\StoreFeedback;
use App\Http\Requests\UpdateFeedback;
use App\Http\Resources\Feedback as FeedbackResource;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Okami101\LaravelAdmin\Filters\SearchFilter;

class FeedbackController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Feedback::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return FeedbackResource::collection(
            QueryBuilder::for(Feedback::class)
                ->allowedFilters([
                    AllowedFilter::custom('q', new SearchFilter(['subject'])),
                    AllowedFilter::exact('id'),
                    AllowedFilter::partial('subject'),
                ])
                ->allowedSorts(['subject'])
                ->allowedIncludes([])
                ->exportOrPaginate()
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return FeedbackResource
     */
    public function show(Feedback $feedback)
    {
        return new FeedbackResource($feedback->load([]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return FeedbackResource
     */
    public function store(StoreFeedback $request)
    {
        $feedback = Feedback::create($request->all());

        return new FeedbackResource($feedback);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Feedback  $feedback
     * @return FeedbackResource
     */
    public function update(UpdateFeedback $request, Feedback $feedback)
    {
        $feedback->update($request->all());

        return new FeedbackResource($feedback);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Feedback $feedback)
    {
        $feedback->delete();

        return response()->noContent();
    }
}
