<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;

class ReportController extends Controller
{
   /**
     * Display a listing of the reports associated with the authenticated user.
     *
     * Retrieves all reports associated with the authenticated user from the database,
     * eager loading the 'book' relationship if defined, and passes the data to the view.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        // Retrieve the authenticated user
        $user = auth()->user();

        // Eager load 'book' relationship if defined
        $reports = $user->reports()->with('book')->get();

        // Return a view with the reports data
        return view('reports.index', compact('reports'));
    }

    /**
     * Display the specified report.
     *
     * Finds a specific report by its ID, retrieves its data from the database,
     * and passes it to the view.
     *
     * @param int $id The ID of the report to display
     * @return \Illuminate\Contracts\View\View
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function show($id)
    {
        // Find a specific report by its ID
        $report = Report::findOrFail($id);

        // Return a view with the report data
        return view('reports.show', compact('report'));
    }

}
