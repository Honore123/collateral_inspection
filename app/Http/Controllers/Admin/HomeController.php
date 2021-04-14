<?php

namespace App\Http\Controllers\Admin;

use App\Models\Earth;
use App\Models\User;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class HomeController
{
    public function index()
    {
        $settings1 = [
            'chart_title'           => 'Approved report',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Earth',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'status',
            'group_by_field_format' => 'd-m-Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'asset',
        ];

        $settings1['total_number'] = 0;

        if (class_exists($settings1['model'])) {
            $settings1['total_number'] = $settings1['model']::when(isset($settings1['filter_field']), function ($query) use ($settings1) {
                return $query->where(
                    $settings1['filter_field'], '=', 2);
            })
                ->{$settings1['aggregate_function'] ?? 'count'}($settings1['aggregate_field'] ?? '*');
        }

        $settings2 = [
            'chart_title'           => 'Members',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Earth',
            'group_by_field'        => '',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'd-m-Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'user',
        ];

        $settings2['total_number'] = 0;

        if (class_exists($settings2['model'])) {
            $settings2['total_number'] = $settings2['model']::when(isset($settings2['filter_field']), function ($query) use ($settings2) {
                if (isset($settings2['filter_days'])) {
                    return $query->where(
                        $settings2['filter_field'],
                        '>=',
                        now()->subDays($settings2['filter_days'])->format('Y-m-d')
                    );
                } else if (isset($settings2['filter_period'])) {
                    switch ($settings2['filter_period']) {
                        case 'week':
                            $start  = date('Y-m-d', strtotime('last Monday'));
                            break;
                        case 'month':
                            $start = date('Y-m') . '-01';
                            break;
                        case 'year':
                            $start  = date('Y') . '-01-01';
                            break;
                    }

                    if (isset($start)) {
                        return $query->where($settings2['filter_field'], '>=', $start);
                    }
                }
            })
                ->{$settings2['aggregate_function'] ?? 'count'}($settings2['aggregate_field'] ?? '*');
        }

        $settings3 = [
            'chart_title'           => 'All property',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Property',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'd-m-Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'assetStatus',
        ];

        $settings3['total_number'] = 0;

        if (class_exists($settings3['model'])) {
            $settings3['total_number'] = $settings3['model']::when(isset($settings3['filter_field']), function ($query) use ($settings3) {
                return $query->where(
                    $settings3['filter_field'], '!=', null);
            })
                ->{$settings3['aggregate_function'] ?? 'count'}($settings3['aggregate_field'] ?? '*');
        }

        $settings4 = [
            'chart_title'           => 'Unapproved report',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Earth',
            'group_by_field'        => 'created_at',
            'aggregate_function'    => 'count',
            'filter_field'          => 'status',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'report',
        ];

        $settings4['total_number'] = 0;

        if (class_exists($settings4['model'])) {
            $settings4['total_number'] = $settings4['model']::when(isset($settings4['filter_field']), function ($query) use ($settings4) {
                return $query->where(
                    $settings4['filter_field'], '=', 1);
            })
                ->{$settings4['aggregate_function'] ?? 'count'}($settings4['aggregate_field'] ?? '*');
        }

        $earths = Earth::where('status', '!=', 0)->orderBy('id', 'DESC')->limit(4)->get();

        return view('home', compact('settings1', 'settings2', 'settings3', 'settings4', 'earths'))->with('users', User::all());
    }
}