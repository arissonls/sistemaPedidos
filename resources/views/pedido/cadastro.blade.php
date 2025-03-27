<x-app-layout>
    <h1 class="w-full text-3xl text-black pb-6">Cadastro de Pedido</h1>

    <div class="w-full mt-6 pl-0">
        <p class="text-xl pb-6 flex items-center">
            <i class="fas fa-list mr-3"></i> Cadastro
        </p>
        @if ($errors->any())
            <div role="alert">
                <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                    Erro!
                </div>
                <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        <div class="leading-loose">

            <form class="p-10 bg-white rounded shadow-xl" action="{{ url('pedidos/save') }}" method="POST">
                @csrf
                <div>
                    <label class="block text-sm text-gray-600" for="client_id">Cliente</label>
                    <select name="client_pedido" id="cliente_pedido" class="select2 form-select block w-full mt-1 bg-white border border-gray-300 rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                        <option value="">Selecione um cliente</option>
                        @foreach($clientes as $client)
                            <option value="{{ $client->id }}">{{ $client->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="py-1 grid grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm text-gray-600" for="dt_expected">Data Esperada</label>
                        <input class="w-auto px-5 py-1 text-gray-700 bg-gray-200 rounded" type="datetime-local" name="dt_expected" required>
                    </div>

                    <div>
                        <label class="block text-sm text-gray-600" for="status">Status (Em Andamento, Finalizada, Entregue) </label>
                        <input class="w-auto px-5 py-1 text-gray-700 bg-gray-200 rounded" type="text" name="status" required>
                    </div>

                    <div>
                        <label class="block text-sm text-gray-600" for="paid">Pago</label>
                        <input class="w-auto px-5 py-1 text-gray-700 bg-gray-200 rounded" type="text" name="paid" required>
                    </div>
                </div>

                <h3>Itens do Pedido</h3>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

                    <table class="table w-full text-sm text-left rtl:text-right">
                        <thead>
                        <tr>
                            <th scope="col" class="px-6 py-2 text-center">Produto</th>
                            <th scope="col" class="px-2 py-2 text-center">Quantidade</th>
                            <th scope="col" class="px-2 py-2 text-center">Valor Uni.</th>
                            <th scope="col" class="px-2 py-2"></th>
                        </tr>
                        </thead>
                        <tbody id="items-table">
                            <tr class="order-item">
                                <td class="border px-4 py-2">
                                    <select name="items[0][product_id]" class="select2 form-select block w-80 mt-1 bg-white border border-gray-300 rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent product-select" data-index="0" required>
                                        <option value="">Selecione um produto</option>
                                        @foreach($produtos as $product)
                                            <option value="{{ $product->id }}" data-price="{{ $product->price }}">{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td class="border px-4 py-2 text-right w-6">
                                    <input type="number" name="items[0][qtd]" placeholder="Quantidade" class="px-5 py-1 text-gray-700 bg-gray-200 rounded qty text-right" required>
                                </td>
                                <td class="border px-4 py-2 text-right w-6">
                                    <input type="number" name="items[0][unit_rating]" placeholder="Preço unitário" class="px-5 py-1 text-gray-700 bg-gray-200 rounded unit-rating text-right" required readonly>
                                </td>
                                <td class="border px-4 py-2 text-right w-6">
                                    <button type="button" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-1 rounded-full remove-item" onclick="removeItem(0)">Remover</button>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr class="font-semibold text-gray-900 dark:text-white">
                                <th scope="row" class="px-6 py-3 text-base">Total</th>
                                <td class="px-6 py-3">0</td>
                                <td class="px-6 py-3">0,00</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <button class="mt-2 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-1 border border-blue-500 hover:border-transparent rounded" type="button" id="add-item">Adicionar Item</button>
                <div class="mt-6">
                    <button class="px-4 py-2 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Criar Pedido</button>
                </div>
            </form>

        </div>
    </div>

<script>

    $(document).ready(function() {
        $('.select2').select2();
    });

        let itemIndex = 1;

    // Adiciona um novo item à tabela
    document.getElementById("add-item").addEventListener("click", function() {
        itemIndex++;
        let newRow = `
            <tr class="order-item">
                <td class="border px-4 py-2">
                    <select name="items[${itemIndex}][product_id]" class="select2 form-select block w-80 mt-1 bg-white border border-gray-300 rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent product-select" required>
                        <option value="">Selecione um produto</option>
                            @foreach($produtos as $product)
                                <option value="{{ $product->id }}" data-price="{{ $product->price }}">{{ $product->name }}</option>
                            @endforeach
                    </select>
                </td>
                <td class="border px-4 py-2 text-right w-6"><input type="number" placeholder="Quantidade" name="items[${itemIndex}][qtd]" class="px-5 py-1 text-gray-700 bg-gray-200 rounded qty text-right" min="1" required></td>
                <td class="border px-4 py-2 text-right w-6"><input type="text" placeholder="Preço unitário" name="items[${itemIndex}][unit_rating]" class="px-5 py-1 text-gray-700 bg-gray-200 rounded unit-rating text-right" readonly></td>
                <td class="border px-4 py-2 text-right w-6"><button type="button" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-1 rounded-full remove-item">Remover</button></td>
            </tr>
        `;
        document.getElementById("items-table").insertAdjacentHTML("beforeend", newRow);
        $('.select2').select2();
    });

    // Evento de delegação para remover itens
    document.getElementById("items-table").addEventListener("click", function(event) {
        if (event.target.classList.contains("remove-item")) {
            event.target.closest("tr").remove();
        }
    });

    // Evento para preencher automaticamente o preço do produto ao selecionar no Select2
    $("#items-table").on("select2:select", ".product-select", function (event) {
        let selectedOption = $(this).find(":selected");
        let price = selectedOption.data("price");

        let row = $(this).closest("tr");
        let unitRatingInput = row.find(".unit-rating");
        let qtdInput = row.find(".qtd");

        if (price) {
            unitRatingInput.val(price);
            qtdInput.val(1); // Padrão para evitar zero
        } else {
            unitRatingInput.val("");
        }
        updatePrice();
    });

    // Função para calcular o total de quantidades e o total geral
    $("#items-table").on("input", ".qty", function () {
        updatePrice();
    });
    function updatePrice(){
        let totalQtd = 0;
        let totalFullRating = 0.0;

        $("#items-table .order-item").each(function () {
            let qtd = parseInt($(this).find(".qty").val()) || 0;
            let fullRating = parseFloat($(this).find(".unit-rating").val()) || 0;

            totalQtd += qtd;
            totalFullRating += fullRating;
        });

        // Atualiza os valores no footer da tabela
        $("tfoot tr td:nth-child(2)").text(totalQtd); // Total de Quantidade
        $("tfoot tr td:nth-child(3)").text(totalFullRating.toFixed(2)); // Total Geral
    }
</script>
</x-app-layout>
