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
                @foreach ($searchValues as $search_value)
                    <tr>
                        <th scope="row">
                            <a
                                href="{{ route('app.QuerySearchResult') }}?querymainvalue={{ $search_value->search_value }}&checkboxvalue1={{ $checkboxvaluex }}&checkboxvalue2={{ $checkboxvaluey }}">{{ $search_value->topic }}</a>
                        </th>
                        <td>
                            <label>
                                <input type="checkbox" name="response[{{ $search_value->id }}]" value="yes"
                                    class="response-checkbox">
                                Yes/No
                            </label>
                        </td>
                        <td>
                            <label>
                                <input type="checkbox" name="response[{{ $search_value->id }}]" value="no"
                                    class="response-checkbox">
                                Yes/No
                            </label>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
