<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Carbon\Carbon;

class StatusController extends Controller
{
    /**
     * Display the system status page.
     *
     * @return Factory|View|Application|object
     */
    public function index()
    {
        // Get all statuses ordered by their display order
        $statuses = Status::ordered()->get();

        // Check if all systems are operational
        $allOperational = $statuses->every(function ($status) {
            return $status->status === 'operational';
        });

        // Get the last update time (most recent updated_at from any status)
        $lastUpdated = $statuses->max('updated_at');

        // Get past incidents (statuses with a last_incident_date)
        $pastIncidents = $statuses->filter(function ($status) {
            return !is_null($status->last_incident_date);
        })->sortByDesc('last_incident_date')->take(3);

        return view('pages.status', compact('statuses', 'allOperational', 'lastUpdated', 'pastIncidents'));
    }

    /**
     * Admin panel: Display a list of all system statuses for management.
     *
     * @return Factory|View|Application|object
     */
    public function adminIndex()
    {
        $statuses = Status::get();
        $allOperational = true;
        $pastIncidents = Status::where('status', 'resolved')->get();
//        dd($statuses);
        return view('admin.statuses.index', compact('statuses','allOperational','pastIncidents'));

    }

    /**
     * Admin panel: Show the form for editing a status.
     *
     * @param  int  $id
     * @return Factory|View|Application|object
     */
    public function edit($id)
    {
        $status = Status::findOrFail($id);
        return view('admin.statuses.edit', compact('status'));
    }

    /**
     * Admin panel: Update the specified status in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $status = Status::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:operational,degraded,partial_outage,major_outage',
            'uptime_percentage' => 'required|numeric|min:0|max:100',
            'last_incident_date' => 'nullable|date',
            'last_incident_description' => 'nullable|string',
            'order' => 'required|integer|min:0',
        ]);

        $status->update($validated);

        return redirect()->route('admin.statuses.index')
            ->with('success', 'Status updated successfully!');
    }
}
