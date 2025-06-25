<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{

    use HasFactory, Searchable;

    protected $fillable = [
        'title',
        'subtitle',
        'slug',
        'body',
        'image',
        'user_id',
        'category_id',
        'is_accepted',
    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }
      public function readDuration() {
        $totalWords = Str::wordCount($this->body);
        $minutesToRead = round($totalWords / 200);
        return intval($minutesToRead);
    }
    /**
     * Get the indexable data array for the model.
     * Questo metodo definisce quali dati dell'articolo verranno indicizzati.
     *
     * @return array<string, mixed>
     */
    public function toSearchableArray(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'body' => $this->body,
            'category' => $this->category->name, 
        ];
    }

    /**
     * Definisce la relazione "un articolo appartiene a un utente".
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Definisce la relazione "un articolo appartiene a una categoria".
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Definisce la relazione "un articolo ha molti tag" (molti-a-molti).
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
