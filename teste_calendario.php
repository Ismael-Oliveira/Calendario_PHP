
<?php
    $data = date('2019-07');
    $day1 = date('w', strtotime($data."-01"));
    $days = date('t', strtotime($data."-01"));
    $qtdLinhas = ceil(($day1+$days)/7);

    $day = -$day1;
    $data_ini = date('Y-m-d', strtotime($day.' days', strtotime($data)));
    $data_fim = date('Y-m-d', strtotime(($day + ($qtdLinhas * 7) - 1).' days', strtotime($data)));
    
    echo "Primeiro dia de Janeiro ".$day1.'<br>';
    echo "Quantidade de dias ".$days.'<br>';
    echo "Qunatidade de linhas calendario ".$qtdLinhas.'<br>';
    echo "Data de inicio ".$data_ini.'<br>';
    echo "Data de fim ".$data_fim.'<br>';

?>

<table border="1" width="100%">
    <tr>
        <th>DOM</th>
        <th>SEG</th>
        <th>TER</th>
        <th>QUA</th>
        <th>QUI</th>
        <th>SEX</th>
        <th>SAB</th>
    </tr>
    <?php
     $count = 0;
     $control = 1;
     for ($linha=0; $linha < $qtdLinhas; $linha++):
    ?>
        <tr>
            <?php for ($col=0; $col < 7; $col++):?>
                <?php
                    if(($col < $day1)){
                        $w = "";
                        // echo "Col ".$col;
                    }else if($control > $days){
                        $w = "";
                        // echo "control ".$control;exit;                      
                    }
                    else{
                        $w = date('Y-m-d', strtotime(($col + $linha*7).' days', strtotime($data_ini)));
                        echo " ".$count++;
                        $control++; 
                    }
                    
                    
                ?>
                <td><?php echo $w ?></td>
            <?php endfor;?>        
        </tr>

    <?php $day1 = $day; endfor;?>
</table>

<br><br>
<hr>
<table border="1" width="100%">
    <tr>
        <th>DOM</th>
        <th>SEG</th>
        <th>TER</th>
        <th>QUA</th>
        <th>QUI</th>
        <th>SEX</th>
        <th>SAB</th>
    </tr>
    <?php for ($linha=0; $linha < $qtdLinhas; $linha++):?>
        <tr>
            <?php for ($col=0; $col < 7; $col++):?>
                <?php $w = date('Y-m-d', strtotime(($col + $linha*7).' days', strtotime($data_ini)));?>
                <td><?php echo $w ?></td>
            <?php endfor;?>        
        </tr>

    <?php endfor;?>
</table>