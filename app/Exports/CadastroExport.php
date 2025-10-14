<?php

namespace App\Exports;

use App\Models\Cadastro;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;

class CadastroExport implements FromQuery,WithMapping,WithHeadings
{

    use Exportable;


     public function headings(): array
    {
        return[
            'Nome',
            'RG',
            'CPF',
            'Telefone',
            'E-mail',
            'Celular',
            'Endereço',
            'Número',
            'Complemento',
            'Bairro',
            'Cidade',
            'Estado',
            'CEP',
            'Nome Dependente',
            'Data Nascimento',
            'Parentesco',
            'Nome Dependente',
            'Data Nascimento',
            'Parentesco',
            'Nome Dependente',
            'Data Nascimento',
            'Parentesco',
            'Nome Dependente',
            'Data Nascimento',
            'Parentesco',
            'Nome Dependente',
            'Data Nascimento',
            'Parentesco',
        ];
    }
  
    public function map($cadastro): array
    {
        return [
            $cadastro->nome,
            $cadastro->rg,
            $cadastro->cpf,
            $cadastro->telefone,
            $cadastro->email,
            $cadastro->celular,
            $cadastro->enderecos->logradouro,
            $cadastro->enderecos->numero,
            $cadastro->enderecos->complemento,
            $cadastro->enderecos->bairro,
            $cadastro->enderecos->cidade,
            $cadastro->enderecos->estado,
            $cadastro->enderecos->cep,
           
        ];
    }
      public function query()
    { 
        return Cadastro::with(['endereco','dependente']);
    }
}