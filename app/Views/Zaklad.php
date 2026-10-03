<?php
echo ($this->extend('Layout/template'));
echo ($this->section('content'));
?>

<div class="row">
    <div class="col-md-12 pt-5">
        <h1 class="text-center">Příž - Nice</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-11 mx-auto">
<?php
/**
 * @var array $priz
 */
    $table = new \CodeIgniter\View\Table();
        $template = array(
        'table_open'=> '<table class="table table-bordered table-striped table-hover">', 
        'thead_open'=> '<thead>',
        'thead_close'=> '</thead>',
        'heading_row_start'=> '<tr>',
        'heading_row_end'=>' </tr>',
        'heading_cell_start'=> '<th>',
        'heading_cell_end' => '</th>',
        'tbody_open' => '<tbody>',
        'tbody_close' => '</tbody>',
        'row_start' => '<tr>',
        'row_end' => '</tr>',
        'cell_start' => '<td>',
        'cell_end' => '</td>',
        'row_alt_start' => '<tr>',
        'row_alt_end' =>'</tr>',
        'cell_alt_start' => '<td>',
        'cell_alt_end' => '</td>',
        'table_close' => '</table>' );

    $table->setTemplate($template);
    $table->setHeading('Logo', 'Z kama kam?', 'Rok', 'Začátek', 'Konec', 'Délka');
    foreach($priz as $row) {
        $imgData = array(
            'src' => base_url('img/logos/' . $row->logo),
            'class' => 'img-fluid',
            'style' => 'max-height: 30px;'
        );    
       $table->addRow(img($imgData),
       $row->real_name,
       $row->year,
       $row->start_date,
       $row->end_date,
       round($row->total_distance, 0) . 'km',
       anchor(base_url('race/' . $row->id), 'Detail', ['class' => 'btn btn-secondary btn-sm']));
    } 
    echo $table->generate();
    
    ?>
    </div>
</div>










<?= $this->endSection(); ?>