
<tbody>

@forelse($animals as $animal)

<tr>

<td>
<strong>
{{ $animal->user->first_name ?? '' }} {{ $animal->user->last_name ?? '' }}
</strong>
</td>

<td>
<span style="font-weight:600;">
{{ ucfirst($animal->animal_type) }}
</span>
</td>

<td>{{ $animal->breed ?? '--' }}</td>

<td>
{{ $animal->last_vaccination ? $animal->last_vaccination->format('M d Y') : '--' }}
</td>

<td>
{{ $animal->next_vaccination ? $animal->next_vaccination->format('M d Y') : '--' }}
</td>

<td>
{{ $animal->last_deworming ? $animal->last_deworming->format('M d Y') : '--' }}
</td>

<td>
{{ $animal->next_deworming ? $animal->next_deworming->format('M d Y') : '--' }}
</td>

<td>
<span class="status {{ strtolower($animal->status) }}">
{{ $animal->status }}
</span>
</td>

<td style="display:flex; gap:8px;">

<a href="{{ route('livestock.edit',$animal->id) }}">
<button class="edit-btn">
<i class="fa-solid fa-pen"></i>
</button>
</a>

<form action="{{ route('livestock.destroy',$animal->id) }}" method="POST">
@csrf
@method('DELETE')

<button 
type="submit" 
class="edit-btn" 
style="background:#c62828"
onclick="return confirm('Delete this livestock?')"
>
<i class="fa-solid fa-trash"></i>
</button>

</form>

</td>

</tr>

@empty

<tr>
<td colspan="9" style="text-align:center;padding:25px;">
No livestock records found.
</td>
</tr>

@endforelse

</tbody>
