<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserReactionsController extends Controller
{
    public function daily(Request $request){
        // get date range
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        // initialize
        $data = [];
        $data['total'] = 0;
        $data['positive'] = 0;
        $data['negative'] = 0;
        $data['neutral'] = 0;

        $days = [];

        $positive_daily_data = [];
        $negative_daily_data = [];
        $neutral_daily_data = [];

        // get total counts per reaction
        $counts = DB::table('reactions')
            ->leftJoin('user_reactions','reactions.id','=','user_reactions.reaction_id')
            ->whereBetween('user_reactions.created_at',[$start_date,$end_date])
            ->select('reactions.type',DB::raw('count(*) as total_reaction_count'))
            ->groupBy('reactions.type')
            ->get();

        // get total counts per day
        $daily_count = DB::table('reactions')
            ->leftJoin('user_reactions','reactions.id','=','user_reactions.reaction_id')
            ->whereBetween('user_reactions.created_at',[$start_date,$end_date])
            ->select('reactions.type',DB::raw('count(*) as total_reaction_count,DATE(user_reactions.created_at) as day'))
            ->groupBy(DB::raw('DATE(user_reactions.created_at)'),'type')
            ->get();

        // assign count to data
        foreach($counts as $count){
            $data[$count->type] = $count->total_reaction_count;
            $data['total'] += $count->total_reaction_count;
        }

        // assign count to data
        foreach($daily_count as $day){
            if($day->type=='positive'){
                $positive_daily_data[$day->day] = $day->total_reaction_count;
            }

        }

        foreach($daily_count as $day){
            if($day->type=='negative'){
                $negative_daily_data[$day->day] = $day->total_reaction_count;
            }

        }
        foreach($daily_count as $day){
            if($day->type=='neutral'){
                $neutral_daily_data[$day->day] = $day->total_reaction_count;
            }

        }

        foreach($daily_count as $day){
                array_push($days,$day->day);
                sort($days);
                $days = array_unique($days);
        }

        // pass to view
        return view('admin.daily.index')
            ->with('data',$data)
            ->with('positive_monthly_data',$positive_daily_data)
            ->with('negative_monthly_data',$negative_daily_data)
            ->with('neutral_monthly_data',$neutral_daily_data)
            ->with('daily_count',$daily_count)
            ->with('days',$days)
            ->with('start_date',$start_date)
            ->with('end_date',$end_date);
    }

    public function monthly(){
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
