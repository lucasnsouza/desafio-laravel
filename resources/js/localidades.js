let urlEstado = "https://servicodados.ibge.gov.br/api/v1/localidades/estados?orderBy=nome";
        

//requisição
$.getJSON(urlEstado, function (data) {
    let conteudo = '<option>';
    $.each(data, function (v, val) {
        conteudo += '<option value="'+val.sigla+'">'+val.nome+'</option>';
    });
    conteudo += '</option>';

    $("#estado").html(conteudo);
});

$("#estado").on('change', function () {
    let valueEsatdo = document.getElementById('estado').value;
    let urlCidade = null;

    switch (valueEsatdo) {
        case "AC":
            urlCidade = "https://servicodados.ibge.gov.br/api/v1/localidades/estados/AC/municipios";
            break;

        case "AL":
            urlCidade = "https://servicodados.ibge.gov.br/api/v1/localidades/estados/AL/municipios";
            break;

        case "AP":
            urlCidade = "https://servicodados.ibge.gov.br/api/v1/localidades/estados/AP/municipios";
            break;

        case "AM":
            urlCidade = "https://servicodados.ibge.gov.br/api/v1/localidades/estados/AM/municipios";
            break;

        case "BA":
            urlCidade = "https://servicodados.ibge.gov.br/api/v1/localidades/estados/BA/municipios";
            break;

        case "CE":
            urlCidade = "https://servicodados.ibge.gov.br/api/v1/localidades/estados/CE/municipios";
            break;

        case "DF":
            urlCidade = "https://servicodados.ibge.gov.br/api/v1/localidades/estados/DF/municipios";
            break;

        case "ES":
            urlCidade = "https://servicodados.ibge.gov.br/api/v1/localidades/estados/ES/municipios";
            break;

        case "GO":
            urlCidade = "https://servicodados.ibge.gov.br/api/v1/localidades/estados/GO/municipios";
            break;

        case "MA":
            urlCidade = "https://servicodados.ibge.gov.br/api/v1/localidades/estados/MA/municipios";
            break;

        case "MT":
            urlCidade = "https://servicodados.ibge.gov.br/api/v1/localidades/estados/MT/municipios";
            break;

        case "MS":
            urlCidade = "https://servicodados.ibge.gov.br/api/v1/localidades/estados/MS/municipios";
            break;

        case "MG":
            urlCidade = "https://servicodados.ibge.gov.br/api/v1/localidades/estados/MG/municipios";
            break;

        case "PA":
            urlCidade = "https://servicodados.ibge.gov.br/api/v1/localidades/estados/PA/municipios";
            break;

        case "PB":
            urlCidade = "https://servicodados.ibge.gov.br/api/v1/localidades/estados/PB/municipios";
            break;

        case "PR":
            urlCidade = "https://servicodados.ibge.gov.br/api/v1/localidades/estados/PR/municipios";
            break;

        case "PE":
            urlCidade = "https://servicodados.ibge.gov.br/api/v1/localidades/estados/PE/municipios";
            break;

        case "PI":
            urlCidade = "https://servicodados.ibge.gov.br/api/v1/localidades/estados/PI/municipios";
            break;

        case "RJ":
            urlCidade = "https://servicodados.ibge.gov.br/api/v1/localidades/estados/RJ/municipios";
            break;

        case "RN":
            urlCidade = "https://servicodados.ibge.gov.br/api/v1/localidades/estados/RN/municipios";
            break;

        case "RS":
            urlCidade = "https://servicodados.ibge.gov.br/api/v1/localidades/estados/RS/municipios";
            break;

        case "RO":
            urlCidade = "https://servicodados.ibge.gov.br/api/v1/localidades/estados/RO/municipios";
            break;

        case "RR":
            urlCidade = "https://servicodados.ibge.gov.br/api/v1/localidades/estados/RR/municipios";
            break;

        case "SC":
            urlCidade = "https://servicodados.ibge.gov.br/api/v1/localidades/estados/SC/municipios";
            break;

        case "SP":
            urlCidade = "https://servicodados.ibge.gov.br/api/v1/localidades/estados/SP/municipios";
            break;

        case "SE":
            urlCidade = "https://servicodados.ibge.gov.br/api/v1/localidades/estados/SE/municipios";
            break;

        case "TO":
            urlCidade = "https://servicodados.ibge.gov.br/api/v1/localidades/estados/TO/municipios";
            break;

        default:
            break;
    }

    //requisição
    $.getJSON(urlCidade, function (data) {
        let conteudo = '<option>';
        $.each(data, function (v, val) {
            conteudo += '<option>'+val.nome+'</option>';
        });
        conteudo += '</option>';

        $("#cidade").html(conteudo);
    });
});
