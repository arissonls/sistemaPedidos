<x-app-layout>
    <h1 class="w-full text-3xl text-black pb-6">Cadastro de Cliente</h1>

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
        <form class="p-10 bg-white rounded shadow-xl" action="{{url('clientes/save')}}" method="POST">
            @csrf
            <p class="text-lg text-gray-800 font-medium pb-4">Dados pessoais</p>
            <div class="">
                <label class="block text-sm text-gray-600" for="name">Nome</label>
                <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name" name="name" type="text" required="" placeholder="Nome" aria-label="Name">
            </div>
            <div class="mt-2">
                <label class="block text-sm text-gray-600" for="email">Email</label>
                <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="email" name="email" type="text" required="" placeholder="Email" aria-label="Email">
            </div>
            <div class="inline-block mt-2 -mx-1 w-1/2">
                <label class="block text-sm text-gray-600" for="birth">Data de nascimento</label>
                <input class="w-full px-2 py-1 text-gray-700 bg-gray-200 rounded" id="birth" name="birth" type="date" required="">
            </div>
            <div class="inline-block mt-2 -mx-1 pl-2 w-1/2">
                <label class="block text-sm text-gray-600" for="cellphone">Telefone</label>
                <input class="w-full px-2 py-1 text-gray-700 bg-gray-200 rounded" id="cellphone" name="cellphone" type="text" required="" placeholder="Telefone" aria-label="Telefone">
            </div>
            <p class="text-lg text-gray-800 font-medium pt-2 pb-4">Endereço do cliente</p>
            <div class="inline-block mt-2 -mx-1 pr-2 w-1/3">
                <label class="hidden block text-sm text-gray-600" for="zip_code">CEP</label>
                <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="zip_code"  name="zip_code" type="text" required="" placeholder="CEP" aria-label="CEP">
            </div>
            <div class="inline-block mt-2 w-1/3 pr-2">
                <label class="hidden block text-sm text-gray-600" for="house">Nº:</label>
                <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="house" name="house" type="text" required="" placeholder="Número" aria-label="Número">
            </div>
            <div class="inline-block mt-2 w-1/3">
                <label class="hidden block text-sm text-gray-600" for="estate">Estado</label>
                <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="estate" name="estate" type="text" required="" placeholder="Estado" aria-label="Estado" readonly>
            </div>
            <div class="mt-2">
                <label class="hidden block text-sm text-gray-600" for="streat">Rua</label>
                <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="streat" name="streat" type="text" required="" placeholder="Rua" aria-label="Rua" readonly>
            </div>
            <div class="mt-2">
                <label class="hidden text-sm block text-gray-600" for="city">Cidade</label>
                <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="city" name="city" type="text" required="" placeholder="Cidade" aria-label="Cidade" readonly>
            </div>
            <div class="mt-2">
                <label class="hidden text-sm block text-gray-600" for="district">Bairro</label>
                <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="district" name="district" type="text" required="" placeholder="Bairro" aria-label="Bairro" readonly>
            </div>
            {{-- <p class="text-lg text-gray-800 font-medium py-4">Payment information</p> --}}
            {{-- <div class="">
                <label class="block text-sm text-gray-600" for="cus_name">Card</label>
                <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_name" name="cus_name" type="text" required="" placeholder="Card Number MM/YY CVC" aria-label="Name">
            </div> --}}
            <div class="mt-6">
                <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Criar</button>
            </div>
        </form>
    </div>
</div>

<script>
    const input = document.getElementById('zip_code');
        input.addEventListener('change',buscaCep);
        function buscaCep(e){
            let cep = e.target.value;
                var request = new XMLHttpRequest();
                request.open('get', "https://viacep.com.br/ws/"+cep+"/json/", true);
                request.send();
                request.onload = function () {
                var data = JSON.parse(this.response);
                    if(data.erro){
                        console.error('Erro!');
                        document.getElementById('streat').value = '';
                        document.getElementById('estate').value = '';
                        document.getElementById('district').value = '';
                        document.getElementById('city').value = '';
                    }else{
                        document.getElementById('streat').value = data.logradouro;
                        document.getElementById('estate').value = data.uf;
                        document.getElementById('district').value = data.bairro;
                        document.getElementById('city').value = data.localidade;
                    }
                }
        
        }
</script>
</x-app-layout>
