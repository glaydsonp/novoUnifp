@foreach ($alunos as $aluno)
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>UniFP - Carnê de pagamentos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            font-size: 1rem
        }

        td {
            border: 1px solid black;
            font-size: 0.8rem;
            padding: 2px 4px;
        }

        table{
            border: 2px solid black;
        }
    </style>
</head>

<body>
    @for ($i = 1; $i <= 6; $i++)
        <table class='width: 100%;'>
            <tr>
                <td colspan='7'><p class='text-center text-uppercase' style="font-weight: bolder; font-size:2rem">Carnê de Pagamento</p></td>
            </tr>
            <tr>
                <td colspan='2' style='text-align:center; font-weight:bold'>Recibo do Sacado</td>
                <td rowspan='7'></td>
                <td colspan='3'><span style='font-weight:bold'>Estabelecimento:</span>  {!!'nome da unidade'!!} </td>
                <td><span style='font-weight:bold'>Vencimento</span>: 0{!!$aluno->Vencimento!!}/00/0000</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Matrícula</td>
                <td> {!! $aluno->id !!} - {!!$aluno->Nome !!}</td>
                <td colspan='3'><span style='font-weight:bold'>Aluno</span>: {!! $aluno->id !!} - {!! $aluno->Nome !!}</td>
                <td><span style='font-weight:bold'>Valor do Doc.</span>: R$  {!!'00,00'!!} </td>
            </tr>
            <tr>
                <td class="font-weight-bold">Carnê/Folha</td>
                <td>Nª. {!! '000000'!!}</td>
                <td>Multa por atraso<br> <span class='text-right'>10%</span> </td>
                <td>Data da Emissão<br> <span class='text-right'>00/00/0000</span> </td>
                <td>Controle <br></td>
                <td>Parcela Nº.<br> <span class='text-right'> {!!$i!!} /18</span> </td>
            </tr>
            <tr>
                <td class="font-weight-bold">Vencimento</td>
                <td>0{!! $aluno->Vencimento !!}/00/0000</td>
                <td colspan='3'>Intruções: cobrar R$0,30 juros ao dia</td>
                <td>Carnê/Folha <br> <span class='text-right'>Nº. {!! '000000'!!}</span></td>
            </tr>
            <tr>
                <td class="font-weight-bold">Valor</td>
                <td>R$ 00,00</td>
                <td colspan='3'><span style="font-weight: bolder">Sacador</span>: {!! $aluno->Pagador !!}</td>
                <td>Valor cobrado: </td>
            </tr>
            <tr>
                <td class="font-weight-bold">Valor Cobrado</td>
                <td></td>
                <td colspan='3'><span style="font-weight: bolder">Via do estabelecimento</span></td>
                <td>Data de pgto.: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Data de Pgto</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan='4'></td>
            </tr>
        </table>
        <br>
        <div style="border-top: dotted 2px #555555;"></div>
        <br>
        <table class='width: 100%;'>
            <tr>
                <td colspan='7'><p class='text-center text-uppercase' style="font-weight: bolder; font-size:2rem">Carnê de Pagamento</p></td>
            </tr>
            <tr>
                <td colspan='2' style='text-align:center; font-weight:bold'>Recibo do Sacado</td>
                <td rowspan='7'></td>
                <td colspan='3'><span style='font-weight:bold'>Estabelecimento:</span>  {!!'nome da unidade'!!} </td>
                <td><span style='font-weight:bold'>Vencimento</span>: 0{!!$aluno->Vencimento!!}/00/0000</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Matrícula</td>
                <td> {!! $aluno->id !!} - {!!$aluno->Nome !!}</td>
                <td colspan='3'><span style='font-weight:bold'>Aluno</span>: {!! $aluno->id !!} - {!! $aluno->Nome !!}</td>
                <td><span style='font-weight:bold'>Valor do Doc.</span>: R$  {!!'00,00'!!} </td>
            </tr>
            <tr>
                <td class="font-weight-bold">Carnê/Folha</td>
                <td>Nª. {!! '000000'!!}</td>
                <td>Multa por atraso<br> <span class='text-right'>10%</span> </td>
                <td>Data da Emissão<br> <span class='text-right'>00/00/0000</span> </td>
                <td>Controle <br></td>
                <td>Parcela Nº.<br> <span class='text-right'> {!!$i+1!!} /18</span> </td>
            </tr>
            <tr>
                <td class="font-weight-bold">Vencimento</td>
                <td>0{!! $aluno->Vencimento !!}/00/0000</td>
                <td colspan='3'>Intruções: cobrar R$0,30 juros ao dia</td>
                <td>Carnê/Folha <br> <span class='text-right'>Nº. {!! '000000'!!}</span></td>
            </tr>
            <tr>
                <td class="font-weight-bold">Valor</td>
                <td>R$ 00,00</td>
                <td colspan='3'><span style="font-weight: bolder">Sacador</span>: {!! $aluno->Pagador !!}</td>
                <td>Valor cobrado: </td>
            </tr>
            <tr>
                <td class="font-weight-bold">Valor Cobrado</td>
                <td></td>
                <td colspan='3'><span style="font-weight: bolder">Via do estabelecimento</span></td>
                <td>Data de pgto.: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Data de Pgto</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan='4'></td>
            </tr>
        </table>
        <br>
        <div style="border-top: dotted 2px #555555;"></div>
        <br>
        <table class='width: 100%;'>
            <tr>
                <td colspan='7'><p class='text-center text-uppercase' style="font-weight: bolder; font-size:2rem">Carnê de Pagamento</p></td>
            </tr>
            <tr>
                <td colspan='2' style='text-align:center; font-weight:bold'>Recibo do Sacado</td>
                <td rowspan='7'></td>
                <td colspan='3'><span style='font-weight:bold'>Estabelecimento:</span>  {!!'nome da unidade'!!} </td>
                <td><span style='font-weight:bold'>Vencimento</span>: 0{!!$aluno->Vencimento!!}/00/0000</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Matrícula</td>
                <td> {!! $aluno->id !!} - {!!$aluno->Nome !!}</td>
                <td colspan='3'><span style='font-weight:bold'>Aluno</span>: {!! $aluno->id !!} - {!! $aluno->Nome !!}</td>
                <td><span style='font-weight:bold'>Valor do Doc.</span>: R$  {!!'00,00'!!} </td>
            </tr>
            <tr>
                <td class="font-weight-bold">Carnê/Folha</td>
                <td>Nª. {!! '000000'!!}</td>
                <td>Multa por atraso<br> <span class='text-right'>10%</span> </td>
                <td>Data da Emissão<br> <span class='text-right'>00/00/0000</span> </td>
                <td>Controle <br></td>
                <td>Parcela Nº.<br> <span class='text-right'> {!!$i+2!!} /18</span> </td>
            </tr>
            <tr>
                <td class="font-weight-bold">Vencimento</td>
                <td>0{!! $aluno->Vencimento !!}/00/0000</td>
                <td colspan='3'>Intruções: cobrar R$0,30 juros ao dia</td>
                <td>Carnê/Folha <br> <span class='text-right'>Nº. {!! '000000'!!}</span></td>
            </tr>
            <tr>
                <td class="font-weight-bold">Valor</td>
                <td>R$ 00,00</td>
                <td colspan='3'><span style="font-weight: bolder">Sacador</span>: {!! $aluno->Pagador !!}</td>
                <td>Valor cobrado: </td>
            </tr>
            <tr>
                <td class="font-weight-bold">Valor Cobrado</td>
                <td></td>
                <td colspan='3'><span style="font-weight: bolder">Via do estabelecimento</span></td>
                <td>Data de pgto.: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Data de Pgto</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td colspan='4'></td>
            </tr>
        </table>
    @endfor
</body>

</html>

@endforeach