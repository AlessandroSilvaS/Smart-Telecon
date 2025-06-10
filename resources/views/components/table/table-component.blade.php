@props(['title' => null, 'labels', 'values', 'whoAre' => null, 'functionClose' => null])

<div style="width: 100%;">
    @if($title)
        <h3 class="mb-3">{{ $title }}</h3>
    @endif

    @php
        $modalPart = '';
        if ($whoAre === 'providers') {
            $modalPart = '#providerAdd';
        } elseif ($whoAre === 'plans') {
            $modalPart = '#plansAdd';
        } elseif ($whoAre === 'contracts') {
            $modalPart = '#contractsAdd';
        }
    @endphp

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />

    <div class="buttons-area mb-3">
        <a href="{{ route('export.pdf') }}" class="btn btn-outline-secondary me-2" target="_blank" title="Exportar PDF">
            <i class="bi bi-file-earmark-bar-graph fs-4"></i>
        </a>

        @if(in_array($whoAre, ['plans', 'providers']))
            <button class="btn btn-outline-primary me-2"
                    id="addRow"
                    data-bs-toggle="modal"
                    data-bs-target="{{ $modalPart }}"
                    type="button"
                    title="Adicionar linha">
                <i class="bi bi-plus fs-4"></i>
            </button>

            @if($whoAre === 'plans')
                <x-modalsProject.modal-addPlan />
            @elseif($whoAre === 'providers')
                <x-modalsProject.modal-add-user />
            @endif
        @endif

        @if($functionClose)
            <button class="btn btn-outline-danger" type="button" onclick="{{ $functionClose }}()" title="Fechar">
                <i class="bi bi-x fs-4"></i>
            </button>
        @endif
    </div>

    <div class="mb-3 mt-3">
        <input type="text" class="form-control searchInput" data-table-id="myTable" placeholder="Filtrar tabela..." />
    </div>

    <div class="table-responsive text-nowrap">
        <table id="myTable" class="table table-bordered filter-table">
            <thead class="table-dark">
                <tr>
                    @foreach ($labels as $label)
                        <th>{{ $label }}</th>
                    @endforeach
                    <th style="width:150px;">Ações</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @forelse ($values as $row)
                    <tr data-id="{{ $row['id'] ?? 0 }}"
                        data-route="{{ route($whoAre . '.destroy', ['id' => '__id__']) }}">
                        @php $cellIndex = 0; @endphp
                        @foreach ($row as $key => $cell)
                            <td data-cell-index="{{ $cellIndex }}" data-cell-key="{{ $key }}">
                                <span class="cell-text">{{ $cell }}</span>
                                <input type="text" class="form-control edit-input" style="display:none;" value="{{ $cell }}">
                            </td>
                            @php $cellIndex++; @endphp
                        @endforeach
                        <td>
                            <button class="btn btn-sm btn-primary edit-row" title="Editar">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <button class="btn btn-sm btn-success save-row" title="Salvar" style="display:none;">
                                <i class="bi bi-check-lg"></i>
                            </button>
                            <button class="btn btn-sm btn-secondary cancel-edit" title="Cancelar" style="display:none;">
                                <i class="bi bi-x-lg"></i>
                            </button>
                            <button class="btn btn-sm btn-danger delete-row" title="Excluir">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="{{ count($labels) + 1 }}" class="text-center">Nenhum dado disponível</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Filtro da tabela
    const searchInputs = document.querySelectorAll('.searchInput');
    searchInputs.forEach(searchInput => {
        const tableId = searchInput.dataset.tableId;
        const table = document.getElementById(tableId);
        if (!table) return;
        const rows = table.querySelectorAll('tbody tr');
        searchInput.addEventListener('keyup', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            rows.forEach(row => {
                let rowText = row.textContent.toLowerCase();
                row.style.display = rowText.includes(searchTerm) ? '' : 'none';
            });
        });
    });

    // Manipulação dos botões na tabela
    document.addEventListener('click', function (e) {
        const target = e.target.closest('button');
        if (!target) return;
        const row = target.closest('tr');
        if (!row) return;

        // Editar linha
        if (target.classList.contains('edit-row')) {
            row.querySelectorAll('.edit-row, .delete-row').forEach(btn => btn.style.display = 'none');
            row.querySelectorAll('.save-row, .cancel-edit').forEach(btn => btn.style.display = '');

            row.querySelectorAll('td').forEach(cell => {
                const cellText = cell.querySelector('.cell-text');
                const editInput = cell.querySelector('.edit-input');
                if (cellText && editInput) {
                    cellText.style.display = 'none';
                    editInput.style.display = '';
                }
            });
        }
        // Cancelar edição
        else if (target.classList.contains('cancel-edit')) {
            row.querySelectorAll('.edit-row, .delete-row').forEach(btn => btn.style.display = '');
            row.querySelectorAll('.save-row, .cancel-edit').forEach(btn => btn.style.display = 'none');

            row.querySelectorAll('td').forEach(cell => {
                const cellText = cell.querySelector('.cell-text');
                const editInput = cell.querySelector('.edit-input');
                if (cellText && editInput) {
                    editInput.value = cellText.textContent.trim();
                    cellText.style.display = '';
                    editInput.style.display = 'none';
                }
            });
        }
        // Salvar edição
        else if (target.classList.contains('save-row')) {
            const id = row.getAttribute('data-id');
            const whoAre = "{{ $whoAre }}";

            let data = {};
            row.querySelectorAll('td').forEach((cell, idx) => {
                if (idx === row.children.length - 1) return; // ignorar coluna ações
                const key = cell.getAttribute('data-cell-key');
                const input = cell.querySelector('input.edit-input');
                if (input) data[key] = input.value.trim();
            });

            let url = '';
            switch(whoAre) {
                case 'providers': url = `/dashboard/users/${id}`; break;
                case 'plans': url = `/dashboard/plans/${id}`; break;
                case 'contracts': url = `/dashboard/contracts/${id}`; break;
                default:
                    alert('Entidade inválida para atualização.');
                    return;
            }

            axios.put(url, data, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            }).then(response => {
                row.querySelectorAll('td').forEach((cell, idx) => {
                    if (idx === row.children.length - 1) return;
                    const input = cell.querySelector('input.edit-input');
                    const span = cell.querySelector('span.cell-text');
                    if (input && span) {
                        span.textContent = input.value.trim();
                        span.style.display = '';
                        input.style.display = 'none';
                    }
                });
                row.querySelectorAll('.edit-row, .delete-row').forEach(btn => btn.style.display = '');
                row.querySelectorAll('.save-row, .cancel-edit').forEach(btn => btn.style.display = 'none');
                alert(response.data.success || 'Atualizado com sucesso!');
            }).catch(error => {
                console.error(error);
                alert('Erro ao atualizar o item. Verifique os dados e tente novamente.');
            });
        }
        // Excluir linha
        else if (target.classList.contains('delete-row')) {
            if (!window.confirmingDelete) {
                window.confirmingDelete = true;
                if (!confirm('Tem certeza que deseja excluir este item?')) {
                    window.confirmingDelete = false;
                    return;
                }
                const id = row.getAttribute('data-id');
                const routeTemplate = row.getAttribute('data-route');
                const url = routeTemplate.replace('__id__', id);
                axios.delete(url, {
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                }).then(response => {
                    location.reload();
                }).catch(error => {
                    console.error(error);
                    alert('Erro ao excluir o item.');
                }).finally(() => {
                    window.confirmingDelete = false;
                });
            }
        }
    });
});
</script>
