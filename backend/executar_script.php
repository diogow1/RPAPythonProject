<?php


$comando = "python ../automation/enviar_emails.py 2>&1";
exec($comando, $outputem);

print_r($outputem[0]);

echo '<br>';

$comando = "python ../automation/enviar_whatsapp.py 2>&1";
exec($comando, $outputwp);
print_r($outputwp[0]);

echo '<br><br><button onclick="window.history.back()">
        Voltar
    </button>';
?>
