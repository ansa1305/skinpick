<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Illuminate\Routing\Controller;
use Exception;

class SkinCareController extends Controller
{
    public function showWelcome()
    {
        try {
            return view('welcome');
        } catch (Exception $e) {
            Log::error('Welcome page error: ' . $e->getMessage());
            return response()->view('errors.500', [], 500);
        }
    }

    public function showForm()
    {
        try {
            return view('form');
        } catch (Exception $e) {
            Log::error('Form page error: ' . $e->getMessage());
            return response()->view('errors.500', [], 500);
        }
    }

    public function processForm(Request $request)
    {
        try {
            // Validate form data
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'gender' => 'required|string|in:male,female,other',
                'age' => 'required|integer|min:13|max:100',
                'skinType' => 'required|string|in:normal,dry,oily,combination,sensitive',
                'climate' => 'required|string|in:tropical,dry,temperate,continental,polar',
                'minBudget' => 'required|numeric|min:0',
                'maxBudget' => 'required|numeric|gt:minBudget',
            ]);

            // Get recommended products based on form data
            $products = $this->getRecommendedProducts($validated);

            // Pass user data and products to the results view
            return view('results', [
                'userData' => $validated,
                'products' => $products
            ]);
        } catch (Exception $e) {
            Log::error('Form processing error: ' . $e->getMessage());
            return response()->view('errors.500', [], 500);
        }
    }

    private function getRecommendedProducts($userData)
    {
        try {
            // Query products based on user data
            return Product::where(function($query) use ($userData) {
                // Filter by skin type
                $query->where('suitable_for', 'like', '%' . $userData['skinType'] . '%');
                
                // Filter by price range
                $query->whereBetween('price', [$userData['minBudget'], $userData['maxBudget']]);
                
                // Age-specific filtering
                if ($userData['age'] < 25) {
                    $query->where('age_group', 'like', '%young%');
                } elseif ($userData['age'] >= 25 && $userData['age'] < 40) {
                    $query->where('age_group', 'like', '%adult%');
                } else {
                    $query->where('age_group', 'like', '%mature%');
                }
                
                // Climate consideration
                if ($userData['climate'] == 'tropical' || $userData['climate'] == 'dry') {
                    $query->where('climate_suitable', 'like', '%' . $userData['climate'] . '%');
                }
            })
            ->orderBy('rating', 'desc')
            ->take(6)
            ->get();
        } catch (Exception $e) {
            Log::error('Product recommendation error: ' . $e->getMessage());
            throw $e;
        }
    }
}