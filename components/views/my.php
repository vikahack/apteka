<?php

use app\models\Naznacheniya;

if (!empty($query)): ?>


<table class="table table-striped" >
<thead class="table table-bordered">
<tr>
<th class="text-center" scope="col">Название лекарства</th>
<th class="text-center" scope="col">Кол-во использований</th>
</tr>
</thead>
<tbody>

<?php foreach($query as $a1): ?>
<tr>
<td class="text-center"><?= $a1['kol'] ?></td>
<td class="text-center"><?= $a1['maxx'] ?></td>
</tr>
<?php endforeach; ?>

</tbody>
</table>



<?php endif;?>