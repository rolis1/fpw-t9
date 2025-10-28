<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container p-4 mx-auto">
        <div class="overflow-x-auto">

            {{-- Alert success / error --}}
            @if (session('success'))
                <div class="mb-4 rounded-lg bg-green-50 p-4 text-green-500">
                    {{ session('success') }}
                </div>
            @elseif(session('error'))
                <div class="mb-4 rounded-lg bg-red-50 p-4 text-red-500">
                    {{ session('error') }}
                </div>
            @endif

            <form method="GET" action="{{ route('product-index') }}" class="mb-4 flex items-center">
                <input
                    type="text"
                    name="search"
                    placeholder="Search products..."
                    value="{{ request('search') }}"
                    class="w-full p-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                >
                <button
                    type="submit"
                    class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                    Search
                </button>

            </form>

            {{-- Tombol tambah data --}}
            <a href="{{ route('product-create') }}">
                <button
                    class="px-6 py-3 mb-4 text-white bg-green-500 border border-green-500 rounded-lg shadow hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">
                    Add Product Data
                </button>
            </a>

            {{-- Tabel data produk --}}
            <table class="min-w-full border border-collapse border-gray-200">
                <thead>
    <tr class="bg-gray-100">
        <th class="px-4 py-2 text-left text-gray-600 border border-gray-200">ID</th>
        <th class="px-4 py-2 text-left text-gray-600 border border-gray-200">Product Name</th>

        {{-- Kolom sortable dengan toggle icon --}}
        @php
            $sortBy = request('sort_by');
            $sortOrder = request('sort_order') === 'asc' ? 'desc' : 'asc';
        @endphp

        <th class="px-4 py-2 text-left text-gray-600 border border-gray-200">
            <a href="{{ route('product-index', ['sort_by' => 'unit', 'sort_order' => $sortOrder, 'search' => request('search')]) }}"
               class="flex items-center gap-1 hover:underline">
                Unit
                @if ($sortBy === 'unit')
                    @if (request('sort_order') === 'asc')
                        <span>▲</span>
                    @else
                        <span>▼</span>
                    @endif
                @else
                    <span class="text-gray-400">↕</span>
                @endif
            </a>
        </th>

        <th class="px-4 py-2 text-left text-gray-600 border border-gray-200">
            <a href="{{ route('product-index', ['sort_by' => 'type', 'sort_order' => $sortOrder, 'search' => request('search')]) }}"
               class="flex items-center gap-1 hover:underline">
                Type
                @if ($sortBy === 'type')
                    @if (request('sort_order') === 'asc')
                        <span>▲</span>
                    @else
                        <span>▼</span>
                    @endif
                @else
                    <span class="text-gray-400">↕</span>
                @endif
            </a>
        </th>

        <th class="px-4 py-2 text-left text-gray-600 border border-gray-200">
            <a href="{{ route('product-index', ['sort_by' => 'information', 'sort_order' => $sortOrder, 'search' => request('search')]) }}"
               class="flex items-center gap-1 hover:underline">
                Information
                @if ($sortBy === 'information')
                    @if (request('sort_order') === 'asc')
                        <span>▲</span>
                    @else
                        <span>▼</span>
                    @endif
                @else
                    <span class="text-gray-400">↕</span>
                @endif
            </a>
        </th>

        <th class="px-4 py-2 text-left text-gray-600 border border-gray-200">
            <a href="{{ route('product-index', ['sort_by' => 'qty', 'sort_order' => $sortOrder, 'search' => request('search')]) }}"
               class="flex items-center gap-1 hover:underline">
                Qty
                @if ($sortBy === 'qty')
                    @if (request('sort_order') === 'asc')
                        <span>▲</span>
                    @else
                        <span>▼</span>
                    @endif
                @else
                    <span class="text-gray-400">↕</span>
                @endif
            </a>
        </th>

        <th class="px-4 py-2 text-left text-gray-600 border border-gray-200">
            <a href="{{ route('product-index', ['sort_by' => 'producer', 'sort_order' => $sortOrder, 'search' => request('search')]) }}"
               class="flex items-center gap-1 hover:underline">
                Producer
                @if ($sortBy === 'producer')
                    @if (request('sort_order') === 'asc')
                        <span>▲</span>
                    @else
                        <span>▼</span>
                    @endif
                @else
                    <span class="text-gray-400">↕</span>
                @endif
            </a>
        </th>

        <th class="px-4 py-2 text-left text-gray-600 border border-gray-200">Aksi</th>
    </tr>
</thead>

                <tbody>
    @forelse ($products as $product)
        <tr class="bg-white hover:bg-gray-50">
            <td class="px-4 py-2 border border-gray-200">{{ $loop->iteration }}</td>

            <td class="px-4 py-2 border border-gray-200">
                <a href="{{ route('product-detail', $product->id) }}"
                    class="text-blue-600 hover:text-blue-800 hover:underline">
                    {{ $product->product_name }}
                </a>
            </td>

            <td class="px-4 py-2 border border-gray-200">{{ $product->unit }}</td>
            <td class="px-4 py-2 border border-gray-200">{{ $product->type }}</td>
            <td class="px-4 py-2 border border-gray-200">{{ $product->information }}</td>
            <td class="px-4 py-2 border border-gray-200">{{ $product->qty }}</td>
            <td class="px-4 py-2 border border-gray-200">{{ $product->producer }}</td>

            <td class="px-4 py-2 border border-gray-200">
                <a href="{{ route('product-edit', $product->id) }}"
                    class="px-2 text-blue-600 hover:text-blue-800">Edit</a>
                <button class="px-2 text-red-600 hover:text-red-800"
                    onclick="confirmDelete('{{ route('product-delete', $product->id) }}')">
                    Hapus
                </button>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="8" class="text-center py-4">
                <p class="mb-4 text-2xl font-bold text-red-600">No products found</p>
            </td>
        </tr>
    @endforelse
</tbody>


            </table>
            <div class="mt-4">
                {{ $products->appends(['search' => request('search')])->links() }}

            </div>
        </div>
    </div>

    {{-- Script konfirmasi hapus --}}
    <script>
        function confirmDelete(deleteUrl) {
            if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                let form = document.createElement('form');
                form.method = 'POST';
                form.action = deleteUrl;

                // CSRF token
                let csrfInput = document.createElement('input');
                csrfInput.type = 'hidden';
                csrfInput.name = '_token';
                csrfInput.value = '{{ csrf_token() }}';
                form.appendChild(csrfInput);

                // Spoof DELETE method
                let methodInput = document.createElement('input');
                methodInput.type = 'hidden';
                methodInput.name = '_method';
                methodInput.value = 'DELETE';
                form.appendChild(methodInput);

                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>
</x-app-layout>