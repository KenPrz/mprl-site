<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Product;
use App\Models\Visitor;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboradController extends Controller
{
    public function index(Request $request)
    {
        $request ->validate([
            'selectedYear' => 'nullable|integer',
            'selectedMonth' => 'nullable|date_format:Y-m',
        ]);

        if ($request->has('selectedYear') && $request->has('selectedMonth')) {
            $date = $request->selectedYear . '-' . $request->selectedMonth . '-01';
            
            $visitors = Visitor::whereYear('created_at', $request->selectedYear)
                ->whereMonth('created_at', substr($request->selectedMonth, -2))
                ->get();
            $selected_year = $request->selectedYear;
            $selected_month = $request->selectedMonth;
        }
        else{
            $visitors = Visitor::where('created_at', '>=', now()->startOfMonth())->get();
            $selected_year = now()->format('Y');
            $selected_month = now()->format('Y-m');
        }

        $blog_posts = BlogPost::where('is_published', true)->count();
        $products = Product::all()->count();
        $users = User::where('role_id',2)->count();
        $visitor_dates = $this->getVisitorMonthsGroupedByYear();
        return Inertia::render('Admin/Dashboard',[
            'blog_posts' => $blog_posts,
            'products' => $products,
            'users' => $users,
            'visitors' =>  [
                'visitor_data' => $visitors,
                'visitor_dates' => $visitor_dates,
                'selected_year' => $selected_year,
                'selected_month' => $selected_month,
            ],
        ]);
    }

    private function getVisitorMonthsGroupedByYear()
    {
        $oldestVisitor = Visitor::oldest('created_at')->first();
        $latestVisitor = Visitor::latest('created_at')->first();
    
        if (!$oldestVisitor || !$latestVisitor) {
            // Handle the case when there are no visitors
            return [];
        }
    
        $oldestMonth = new \DateTime($oldestVisitor->created_at->format('Y-m'));
        $latestMonth = new \DateTime($latestVisitor->created_at->format('Y-m'));
        $latestMonth->modify('first day of next month'); // Include the latest month in the period
    
        $interval = \DateInterval::createFromDateString('1 month');
        $period = new \DatePeriod($oldestMonth, $interval, $latestMonth);
    
        $monthsGroupedByYear = [];
        foreach ($period as $dt) {
            $year = $dt->format('Y');
            $month = $dt->format('Y-m');
            $monthsGroupedByYear[$year][] = $month;
        }

        return $monthsGroupedByYear;
    }
    
    
}
