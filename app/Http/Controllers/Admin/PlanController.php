<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;
use App\Http\Requests\PlanRequest;

class PlanController extends Controller
{
    private $repository;

    public function __construct(Plan $plan)
    {
        $this->repository = $plan;
    }

    public function index() 
    {

        $plans = $this->repository->latest()->paginate();

    
        return view('admin.pages.plans.index', [
            'plans' => $plans,
        ]);
    }

    public function create()
    {
        return view('admin.pages.plans.create');
    }

    public function store(PlanRequest $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('plan.index');
    }

    public function show($url) 
    {
        $plan = $this->repository->where('url', $url)->first();

        if(!$plan)
        return redirect()->back();

        return view('admin.pages.plans.show', [
            'plan' => $plan
        ]);
    }

    public function search(Request $request) 
    {

        $filters = $request->all();

        $plans = $this->repository->search($request->filter);

        return view('admin.pages.plans.index', [
            'plans' => $plans,
            'filters' => $filters
        ]);
    }

    public function destroy($id)
    {
        $plan = $this->repository->where('id', $id)->first();

        if(!$plan)
            return redirect()->back();
        

        $plan->delete();

        return redirect()->route('plan.index');
    }
}
