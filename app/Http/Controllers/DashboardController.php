<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // initialize
        $data = [];
        $data['total'] = 0;
        $data['positive'] = 0;
        $data['negative'] = 0;
        $data['neutral'] = 0;

        $positive_monthly_data = [];
        $negative_monthly_data = [];
        $neutral_monthly_data = [];

        // get total counts per reaction
        $counts = DB::table('reactions')
            ->leftJoin('user_reactions','reactions.id','=','user_reactions.reaction_id')
            ->whereBetween('user_reactions.created_at',['2019-01-01','2019-12-31'])
            ->select('reactions.type',DB::raw('count(*) as total_reaction_count'))
            ->groupBy('reactions.type')
            ->get();

        // get total counts per month
        $count_per_month = DB::table('reactions')
            ->leftJoin('user_reactions','reactions.id','=','user_reactions.reaction_id')
            ->whereBetween('user_reactions.created_at',['2019-01-01','2019-12-31'])
            ->select('reactions.type',DB::raw('count(*) as total_reaction_count,MONTH(user_reactions.created_at) as month'))
            ->groupBy(DB::raw('MONTH(user_reactions.created_at)'),'type')
            ->get();

        // assign count to data
        foreach($counts as $count){
            $data[$count->type] = $count->total_reaction_count;
            $data['total'] += $count->total_reaction_count;
        }

        // assign count to data
        foreach($count_per_month as $month){
            if($month->type=='positive'){
                $positive_monthly_data[$month->month] = $month->total_reaction_count;
            }

        }

        foreach($count_per_month as $month){
            if($month->type=='negative'){
                $negative_monthly_data[$month->month] = $month->total_reaction_count;
            }

        }
        foreach($count_per_month as $month){
            if($month->type=='neutral'){
                $neutral_monthly_data[$month->month] = $month->total_reaction_count;
            }

        }

        // pass to view
        return view('admin.dashboard.index')
            ->with('data',$data)
            ->with('positive_monthly_data',$positive_monthly_data)
            ->with('negative_monthly_data',$negative_monthly_data)
            ->with('neutral_monthly_data',$neutral_monthly_data);
    }
}
