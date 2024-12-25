<div>
    <div class="container mt-4">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Name of Query</th>
                    <th scope="col">Quran Verses</th>
                    <th scope="col">Associated Hadith</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($searchValues as $item)
                    <tr>
                        <th scope="row">
                            <a href="javascript:void(0)"
                               wire:click.prevent='showData({{ $item->id }}, "{{ $item->search_value }}")'>
                                {{ $item->topic }}
                            </a>
                        </th>
                        <td>
                            <input type="checkbox"
                                   wire:click="selectQuranVerse({{ $item->id }})"
                                   {{ $checkboxvaluex[$item->id] ?? false ? 'checked' : '' }}>
                            <label>Yes/No</label>
                        </td>
                        <td>
                            <input type="checkbox"
                                   wire:click="selectHadith({{ $item->id }})"
                                   {{ $checkboxvaluey[$item->id] ?? false ? 'checked' : '' }}>
                            <label>Yes/No</label>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
