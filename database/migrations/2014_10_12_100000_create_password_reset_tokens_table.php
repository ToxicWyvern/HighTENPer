
<?php
/* De code die u heeft opgegeven, is een PHP-migratiebestand. In Laravel worden migraties gebruikt om
wijzigingen in het databaseschema te beheren. */
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  /**
   * De functie maakt een tabel met de naam 'password_reset_tokens' met kolommen voor e-mail, token en
   * create_at.
   */
    public function up(): void
    {
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('password_reset_tokens');
    }
};
