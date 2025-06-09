<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Planos PDF</title>
    <style>
        table { width: 100%; border-collapse: collapse;}
        th, td { border: 1px solid #000; padding: 8px; }
    </style>
</head>
<body>
    <h2>Seus planos</h2>
    <table>
        <thead>
            <tr><th>Nome</th><th>Valor</th><th>Velocidade</th><th>Tipo</th></tr>
        </thead>
        <tbody>
            @foreach($plansPdf as $planPdf)
            <tr>
                <td>{{ $planPdf->name_plan }}</td>
                <td>R$ {{ $planPdf->price_plan}}</td>
                <td>{{ $planPdf->speed_plan }}</td>
                <td>{{ $planPdf->type_plan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
