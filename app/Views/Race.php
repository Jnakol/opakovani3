<?php
echo ($this->extend('Layout/template'));
echo ($this->section('content'));
?>

<div class="row">
    <div class="col-12 py-5 mx-auto">
        <h1 class="text-center"><?=esc($heder[0]->race_name) . ' ' . esc($heder[0]->year)?></h1>
    </div>
</div>
<div class="row py-1">
    <div class="col text-center">
        <a class="no-text-decoration btn btn-secondary btn-sm" href="<?=base_url("")?>">Zpět na hlavní stránku</a>
    </div>
</div>

<div class="row">
    <div class="col-md-11 mx-auto">
        <?php
/**
 * @var array $stages
 * @var array $resultTypesByStage
 */
    $table = new \CodeIgniter\View\Table();
        $table->setTemplate([
            'table_open' => '<table class="table table-bordered table-striped table-hover">',
            'thead_open' => '<thead>',
            'thead_close' => '</thead>',
            'heading_row_start' => '<tr>',
            'heading_row_end' => '</tr>',
            'heading_cell_start' => '<th>',
            'heading_cell_end' => '</th>',
            'tbody_open' => '<tbody>',
            'tbody_close' => '</tbody>',
            'row_start' => '<tr>',
            'row_end' => '</tr>',
            'cell_start' => '<td>',
            'cell_end' => '</td>',
            'row_alt_start' => '<tr>',
            'row_alt_end' => '</tr>',
            'cell_alt_start' => '<td>',
            'cell_alt_end' => '</td>',
            'table_close' => '</table>',]);
        
        $table->setHeading('Etapa', 'Datum', 'Délka', 'Převýšení', 'Typ etapy', 'Vítěz etapy', 'Výsledky');
        foreach ($stage as $row) {
            $table->addRow($row->number,
            $row->date, $row->distance . ' km',
            $row->vertical_meters . ' m',
            $row->name,
            $row->first_name . ' ' . $row->last_name,
            anchor(base_url('result/' . $row->id), 'Výsledky', ['class' => 'btn btn-secondary btn-sm'])
            );}
            echo ($table->generate());
            ?>
    </div>
</div>

<?= $this->endSection(); ?>