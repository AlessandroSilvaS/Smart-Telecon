<?php

namespace App\Http\Controllers;
use App\Models\Contract;

use Illuminate\Http\Request;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Illuminate\Support\Facades\Auth;

class ShowDocumentController extends Controller
{
    public function showDocument()
    {
        $user = Auth::user();
        $team = $user->currentTeam;
        $teamName = $team->name;

        return view('presentation.createDocument', compact('team'));
    }

    public function generate(Request $request): BinaryFileResponse
{
    $request->validate([
        'vigencia_inicio' => 'required|date',
        'vigencia_fim' => 'required|date',
        'valor' => 'required|string',
        'cidade' => 'required|string',
    ]);

    $user = Auth::user();
    $team = $user->currentTeam;
    $teamName = $team->name;

    $phpWord = new PhpWord();
    
    // Definir estilos explicitamente
    $tituloStyle = ['bold' => true, 'size' => 26, 'name' => 'Arial', 'color' => 'black'];
    $subtituloStyle = ['bold' => true, 'size' => 14, 'name' => 'Arial', 'color' => 'black'];
    $normalStyle = ['size' => 12, 'name' => 'Calibri'];
    $negritoStyle = ['bold' => true, 'size' => 12, 'name' => 'Calibri'];
    $assinaturaStyle = ['bold' => true, 'size' => 12, 'name' => 'Calibri'];
    
    $tituloParaStyle = ['alignment' => 'center', 'spaceAfter' => 400];
    $normalParaStyle = ['alignment' => 'both', 'spaceAfter' => 240];
    $listaParaStyle = ['spaceAfter' => 120, 'indent' => 720];
    $assinaturaParaStyle = ['spaceBefore' => 480];

    $section = $phpWord->addSection();

    // Título principal
    $section->addText('Contrato de Prestação de Serviços', $tituloStyle, $tituloParaStyle);
    $section->addTextBreak(1);

    // Texto inicial
    $section->addText('Entre as partes:', $subtituloStyle, $normalParaStyle);

    // Dados das partes
    $section->addText("Empresa: Smart Telecom", $normalStyle, $normalParaStyle);
    $section->addText("Provedor: {$user->name}", $normalStyle, $normalParaStyle);
    $section->addText("Time: {$teamName}", $normalStyle, $normalParaStyle);
    $section->addText("CNPJ: {$user->cnpj}", $normalStyle, $normalParaStyle);
    $section->addText("Cidade: {$request->cidade}", $normalStyle, $normalParaStyle);
    $section->addText("Valor do Contrato: R$ {$request->valor}", $normalStyle, $normalParaStyle);

    $vigencia = "{$request->vigencia_inicio} até {$request->vigencia_fim}";
    $section->addText("Período de Vigência: {$vigencia}", $normalStyle, $normalParaStyle);

   $section->addTextBreak(1);

    // Objetivo do contrato
    $section->addText("Objetivo do contrato:", $subtituloStyle, $normalParaStyle);
    $section->addText("Prestação de serviços de telecomunicação conforme as necessidades.", $normalStyle, $normalParaStyle);

    $section->addTextBreak(1);

    // Obrigações da Smart Telecom
    $section->addText("Obrigações da Smart Telecom:", $subtituloStyle, $normalParaStyle);
    // Definir estilo de lista
    $listStyle = ['listType' => \PhpOffice\PhpWord\Style\ListItem::TYPE_BULLET_FILLED];
    $section->addListItem("Oferecer suporte técnico adequado", 0, $normalStyle, $listStyle, $listaParaStyle);
    $section->addListItem("Disponibilidade de serviços contratados", 0, $normalStyle, $listStyle, $listaParaStyle);

    $section->addTextBreak(1);

    // Obrigações do cliente
    $section->addText("Obrigações do cliente:", $subtituloStyle, $normalParaStyle);
    $section->addListItem("Efetuar o pagamento conforme o estipulado", 0, $normalStyle, $listStyle, $listaParaStyle);
    $section->addListItem("Utilizar os serviços dentro das regras do contrato", 0, $normalStyle, $listStyle, $listaParaStyle);

    $section->addTextBreak(2);

    // Assinaturas
    $section->addText("Assinatura: __________________________", $assinaturaStyle, $assinaturaParaStyle);
    $section->addText("Data: ____/____/________", $assinaturaStyle, $assinaturaParaStyle);
    
    $tempFile = tempnam(sys_get_temp_dir(), 'contrato') . '.docx';
$writer = IOFactory::createWriter($phpWord, 'Word2007');
$writer->save($tempFile); // Salva o contrato no arquivo temporário

// Salvar no banco (opcionalmente, armazene o nome do arquivo real se for mover ele depois)
Contract::create([
    'user_id' => $user->id,
    'team_name' => $teamName,
    'cnpj' => $user->cnpj,
    'cidade' => $request->cidade,
    'valor' => $request->valor,
    'vigencia_inicio' => $request->vigencia_inicio,
    'vigencia_fim' => $request->vigencia_fim,
    'path' => $tempFile,
]);
return response()->download($tempFile, 'contratoSmart.docx')->deleteFileAfterSend(true);

}

}
