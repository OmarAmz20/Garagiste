<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ReparationController;
use App\Http\Controllers\SparePartController;
use App\Http\Controllers\VehiculeController;
use App\Models\Reparation;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('dashboard', [AuthController::class, 'dashboard']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
Route::get("/clients", [ClientController::class, "index"])->name("clients.index");
Route::get("/ClientProfile", [ClientController::class, "profile"])->name("client.profile");
Route::post("/delete", [ClientController::class, "deleteModal"])->name("modal.delete");
Route::post("/ConfirmDelete", [ClientController::class, "delete"])->name("modal.ConfirmDelete");
Route::get("/addClient", [ClientController::class, "addModal"])->name("client.add");
Route::post("/newClient", [ClientController::class, "addClient"])->name("client.newClient");
Route::get("/modifyClient", [ClientController::class, "updateModal"])->name("client.ModifyModal");
Route::post("/updateClient", [ClientController::class, "updateClient"])->name("client.updateClient");

Route::get("/vehicules", [VehiculeController::class, "index"])->name("vehicules.index");
Route::get("/addVehicle", [VehiculeController::class, "addModal"])->name("vehicule.addVehicle");
Route::post("/newVehicle", [VehiculeController::class, "addVehicle"])->name("vehicule.newVehicle");
Route::post("/deleteVehicle", [VehiculeController::class, "deleteModel"])->name("vehicule.deleteVehicle");
Route::post("/ConfirmDeleteVehicle", [VehiculeController::class, "confirmDelete"])->name("vehicule.ConfirmDelete");
Route::post("/updateVehicule", [VehiculeController::class, "updateModel"])->name("vehicule.updateVehicule");
Route::post("/ConfirmUpdate", [VehiculeController::class, "updateVehicle"])->name("vehicule.ConfirmUpdate");

Route::get("/repair", [ReparationController::class, "index"])->name("repair.index");
Route::get("/createRepair", [ReparationController::class, "addModal"])->name("repair.createRepair");
Route::post("/createRepair", [ReparationController::class, "createRepair"])->name("repair.createRepair");
Route::post("/modifyStatus", [ReparationController::class, "modifyStatus"])->name("repair.modifyStatus");
Route::post("/modifyNote_Michanic", [ReparationController::class, "modifyNotesMichanic"])->name("repair.modifyNote_Michanic");
Route::post("/modifyNote_Client", [ReparationController::class, "modifyNotesClient"])->name("repair.modifyNote_Client");

Route::get("/Stock", [SparePartController::class, "index"])->name("spareParts.index");
Route::get("/addSparePart", [SparePartController::class, "addModal"])->name("spareParts.add");
Route::post("/createSparePart", [SparePartController::class, "addRepare"])->name("spareParts.create");
Route::post("/deleteSparePart", [SparePartController::class, "deleteModal"])->name("spareParts.delete");
Route::post("/ConfirmDeleteSparePart", [SparePartController::class, "deleteSparePart"])->name("spareParts.confirmDelete");
Route::post("/updateSparePart", [SparePartController::class, "updateModal"])->name("spareParts.update");
Route::post("/modifysparePart", [SparePartController::class, "modifySparePart"])->name("spareParts.confirmUpdate");

});
