<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleção de Marcas e Modelos de Carro</title>
    <link rel="icon" href="../imgs/logo.png" type="image/x-icon">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            margin-top: 20px;
        }

        table {
            width: 70%;
            border-collapse: collapse;
            margin-left: 200px;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        select {
            margin-left: 0px;
            width: 80%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        label {
            margin-left: 100px;
        }

        select:focus {
            outline: none;
            border-color: #4CAF50;
        }

        option {
            padding: 10px;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Selecione uma Marca de Carro:</h2>
    <form>
        <label for="carro">Marca:</label>
        <select id="carro" name="carro">
            <option value="" selected>Selecione</option>
            <option value="Astra">Astra</option>
            <option value="Blazer">Blazer</option>
            <option value="Camaro">Camaro</option>
            <option value="Celta">Celta</option>
            <option value="Civic">Civic</option>
            <option value="Cobalt">Cobalt</option>
            <option value="Corsa">Corsa</option>
            <option value="Courier">Courier</option>
            <option value="Cruze">Cruze</option>
            <option value="EcoSport">EcoSport</option>
            <option value="Edge">Edge</option>
            <option value="Equinox">Equinox</option>
            <option value="Escape">Escape</option>
            <option value="Etios">Etios</option>
            <option value="Explorer">Explorer</option>
            <option value="F-150">F-150</option>
            <option value="F-250">F-250</option>
            <option value="Fiesta">Fiesta</option>
            <option value="Focus">Focus</option>
            <option value="Fusion">Fusion</option>
            <option value="Gol">Gol</option>
            <option value="HB20">HB20</option>
            <option value="Ka">Ka</option>
            <option value="Montana">Montana</option>
            <option value="Mustang">Mustang</option>
            <option value="Onix">Onix</option>
            <option value="Palio">Palio</option>
            <option value="Prisma">Prisma</option>
            <option value="Ranger">Ranger</option>
            <option value="S10">S10</option>
            <option value="Sandero">Sandero</option>
            <option value="Spin">Spin</option>
            <option value="Tracker">Tracker</option>
            <option value="Transit">Transit</option>
            <option value="Vectra">Vectra</option>
        </select>
    </form>

    <h2>Modelos de Carro</h2>
    <table id="tabela-modelos">
        <thead>
            <tr>
                <th>Modelo</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <script>
        const selectMarca = document.getElementById('carro');
        const tabelaModelos = document.getElementById('tabela-modelos');

        selectMarca.addEventListener('change', function() {
            const marcaSelecionada = this.value;
            const modelos = obterModelos(marcaSelecionada);
            atualizarTabelaModelos(modelos);
        });

        function obterModelos(marca) {
            const modelosPorMarca = {
    "Astra": ["Astra Sport", "Astra Turbo", "Astra Elite"],
    "Blazer": ["Blazer LT", "Blazer Premier", "Blazer RS"],
    "Camaro": ["Camaro SS", "Camaro ZL1", "Camaro 1LE"],
    "Celta": ["Celta Life", "Celta Joy", "Celta Power"],
    "Civic": ["Civic LX", "Civic EX", "Civic Touring"],
    "Cobalt": ["Cobalt LTZ", "Cobalt Advantage", "Cobalt Elite"],
    "Corsa": ["Corsa Joy", "Corsa Classic", "Corsa Premium"],
    "Courier": ["Courier XL", "Courier XLT", "Courier Limited"],
    "Cruze": ["Cruze LT", "Cruze Premier", "Cruze RS"],
    "EcoSport": ["EcoSport SE", "EcoSport Titanium", "EcoSport Freestyle"],
    "Edge": ["Edge SEL", "Edge ST", "Edge Titanium"],
    "Equinox": ["Equinox LT", "Equinox Premier", "Equinox RS"],
    "Escape": ["Escape S", "Escape SE", "Escape SEL"],
    "Etios": ["Etios XS", "Etios XLS", "Etios Platinum"],
    "Explorer": ["Explorer XLT", "Explorer Limited", "Explorer ST"],
    "F-150": ["F-150 XL", "F-150 XLT", "F-150 Lariat"],
    "F-250": ["F-250 XL", "F-250 XLT", "F-250 King Ranch"],
    "Fiesta": ["Fiesta SE", "Fiesta ST", "Fiesta Titanium"],
    "Focus": ["Focus SE", "Focus SEL", "Focus ST"],
    "Fusion": ["Fusion S", "Fusion SE", "Fusion Titanium"],
    "Gol": ["Gol Trendline", "Gol Comfortline", "Gol Highline"],
    "HB20": ["HB20 Comfort", "HB20 Unique", "HB20 Diamond"],
    "Ka": ["Ka SE", "Ka SEL", "Ka Freestyle"],
    "Montana": ["Montana LS", "Montana Sport", "Montana Advantage"],
    "Mustang": ["Mustang EcoBoost", "Mustang GT", "Mustang Mach 1"],
    "Onix": ["Onix LT", "Onix RS", "Onix Premier"],
    "Palio": ["Palio Fire", "Palio Attractive", "Palio Adventure"],
    "Prisma": ["Prisma LT", "Prisma RS", "Prisma Premier"],
    "Ranger": ["Ranger XLT", "Ranger Limited", "Ranger Wildtrak"],
    "S10": ["S10 LT", "S10 High Country", "S10 Trailblazer"],
    "Sandero": ["Sandero Expression", "Sandero Dynamique", "Sandero Stepway"],
    "Spin": ["Spin LT", "Spin Activ", "Spin Premier"],
    "Tracker": ["Tracker LT", "Tracker RS", "Tracker Premier"],
    "Transit": ["Transit Furgão", "Transit Chassi", "Transit Minibus"],
    "Vectra": ["Vectra Expression", "Vectra Elegance", "Vectra Elite"]
};


            return modelosPorMarca[marca] || [];
        }

        function atualizarTabelaModelos(modelos) {
            const tbody = tabelaModelos.querySelector('tbody');
            tbody.innerHTML = '';

            modelos.forEach(function(modelo) {
                const row = document.createElement('tr');
                const cell = document.createElement('td');
                cell.textContent = modelo;
                row.appendChild(cell);
                tbody.appendChild(row);
            });
        }
    </script>
</body>
</html>
