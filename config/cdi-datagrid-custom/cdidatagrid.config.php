<?php

return [
    'cdidatagrid_options' => array(
        'recordsPerPage' => 10,
        'templates' => array(
            'cdigenerator' => array(
                'form_view' => 'cdidatagrid/form/form-ajax-2col',
                'grid_view' => 'cdidatagrid/grid/grid-ajax',
                'detail_view' => 'cdidatagrid/detail/detail-ajax',
                'pagination_view' => 'cdidatagrid/pagination/pagination-ajax'
            )
        ),
    ),
];
