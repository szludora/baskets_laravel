# Basket Laravel project

+ We made base laravel project with 4 table (user, basket, product, product_type), basket has composite key (user_id + item_id).
+ We wrote the model with function called: setKeysForSaveQuery, gave one query type parameter, the query return the composite key's value(s).
+ In the migration file we set these 2 key as the composite key.
+ To make BasketFactory work well, we wrote a specific query into that, and query to BasketController too.
+ Finally we test it with thunder client and see the miracle, it's working fine.


___________________________________________________________________________
## The newest learned:
___________________________________________________________________________
### Basket (Model):

```
protected function setKeysForSaveQuery($query)
    {
        $query
        // az a lényeg, hogyan hívják őt a táblában --> user_id
        ->where('user_id', '=', $this->getAttribute('user_id'))
        ->where('item_id', '=', $this->getAttribute('item_id'));
        return $query;
    }
```
___________________________________________________________________________
### Basket Migration:

```
$table->primary(['user_id', 'item_id']);
$table->foreignId('user_id')->references('id')->on('users');
$table->foreignId('item_id')->references('item_id')->on('products');
```
___________________________________________________________________________
### BasketFactory:

```
public function definition(): array
    {
        $repeats = 10;
        do {
            $user_id = User::all()->random()->id;
            $item_id = Product::all()->random()->item_id;
            $basket = Basket::where('user_id', $user_id)
                ->where('item_id', $item_id)
                ->get();
            $repeats--;
        } while ($repeats >= 0 && count($basket) > 0);

        return [
            'user_id' => $user_id,
            'item_id' => $item_id,
        ];
    }
```
___________________________________________________________________________
### BasketController:

```
public function show($user_id, $item_id)
    {
        $basket = Basket::where('user_id', $user_id)
            ->where('item_id', $item_id)
            ->first();
        // ->get();
        // return $basket[0];
        return $basket;
    }
// composite keys --> update and destroy: use the show() instead of find()
```
___________________________________________________________________________
