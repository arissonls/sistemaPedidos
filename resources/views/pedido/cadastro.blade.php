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
            <form class="p-10 bg-white rounded shadow-xl" action="{{ url('pedidos/save') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <p class="text-lg text-gray-800 font-medium pb-4">Ordem de Pedido</p>
                <div class="">
                    <label class="block text-sm text-gray-600" for="name">Cliente</label>
                    <select id="cliente" name="cliente">
                        @foreach($clientes as $c)
                            <option value="{{$c->id}}">{{$c->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="inline-block mt-2 -mx-1 w-100" id="cliente_info">
                    <label class="block text-sm text-gray-600" for="price">Cliente</label>
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="cus_name" name="cus_name" type="text" readonly placeholder="Your Name" aria-label="Name" value="TOBOCO LINDO">
                    <label class="block text-sm text-gray-600" for="price">Email</label>
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" type="email" readonly placeholder="Your Name" aria-label="Name" value="TOBOCO.L@LINDO.CO">
                    <label class="block text-sm text-gray-600" for="price">Whats</label>
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" type="text" readonly placeholder="Your Name" aria-label="Name" value="@)@)@)@))@)))@">
                    <label class="block text-sm text-gray-600" for="price">End</label>
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" type="text" readonly placeholder="Your Name" aria-label="Name" value="RR: asdasdasd, 300, asdasdkaskdas, asdasd-2">
                </div>
                <div class="inline-block mt-2 -mx-1 pl-2 w-1/2">
                    {{-- <label class="block text-sm text-gray-600" for="slug">Imagem</label>
                    <input class="w-full px-2 py-1 text-gray-700 bg-gray-200 rounded" id="slug" name="slug"
                        type="file" required=""> --}}
                </div>

                <div class="mt-6">
                    <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded"
                        type="submit">Criar</button>
                </div>
            </form>
        </div>
    </div>
    
<script>
    var clientes = JSON.parse('<?= $clientes?>');
    $(document).ready(function() {
        $('#cliente').select2({
            templateSelection: setCliente
        });
    });

    function setCliente(c){
        var dado_cliente = clientes.find(item => item.id == c.id);
        // $("#cliente_info").empty();
        // var html = '<hr>'+
        //             '<label class="block text-sm text-gray-600" for="price">Cliente</label>'+
        //             dado_cliente.name+
        //         '<hr>';
        // $("#cliente_info").append(html);
    }
</script>
</x-app-layout>
