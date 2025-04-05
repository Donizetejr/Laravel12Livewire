# 🚀 Projeto Laravel com Livewire, Breeze, Pest e Redis

Este repositório contém uma base sólida para iniciar um projeto Laravel com autenticação integrada, Livewire para componentes reativos, Pest para testes e Redis para cache (especialmente de permissões).

---

## 📦 Criando o Projeto Laravel com Livewire e Pest

### 1. Criar o projeto Laravel
```bash
composer create-project laravel/laravel nome-do-projeto
cd nome-do-projeto
```

### 2. Instalar o Laravel Breeze com suporte ao Livewire
```bash
composer require laravel/breeze --dev
php artisan breeze:install livewire
```

### 3. Instalar as dependências do frontend e compilar os assets
```bash
npm install && npm run dev
```

### 4. Rodar as migrations
```bash
php artisan migrate
```

### 5. Instalar o Pest como framework de testes
```bash
composer require pestphp/pest --dev
php artisan pest:install
```

---

## 🛠️ Configurando o Redis no Projeto

### 1. Atualizar o arquivo `.env` para usar Redis como driver de cache

```env
CACHE_DRIVER=redis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379
```

> ⚠️ O Redis precisa estar instalado e rodando na sua máquina.
> Você pode instalar via Docker ou manualmente.
> Saiba mais: https://redis.io/docs/getting-started/

---

## 🧠 Estrutura de Pastas para Cache de Permissões com Redis

Este projeto utiliza uma estrutura clara, orientada a ações e responsabilidades separadas, para armazenar e recuperar permissões de usuários no Redis:

```
app/
├── Actions/
│   └── Permissions/
│       ├── CacheUserPermissions.php         # Armazena permissões do usuário no Redis
│       └── GetCachedUserPermissions.php     # Recupera permissões do usuário a partir do Redis
│
├── Listeners/
│   └── CacheUserPermissionsOnLogin.php      # Escuta evento de login e executa cache das permissões
│
├── Models/
│   └── Permission.php                       # Modelo da tabela permissions (N:N com usuários)
│
├── Services/
│   └── PermissionService.php                # Serviço opcional para abstrair acesso a permissões
```

> 🎯 Essa arquitetura facilita a manutenção, reutilização e testabilidade da lógica de permissões.

---

## ✅ Próximos Passos Recomendados

- Criar as migrations para `permissions` e `permission_user` (relacionamento N:N).
- Associar permissões aos usuários.
- Utilizar policies e middlewares com base nas permissões cacheadas.
- Adicionar testes com Pest para validar cenários de acesso e autorização.

---

## 🧪 Exemplo de Teste com Pest

```php
test('usuário com permissão "admin" pode acessar dashboard', function () {
    $user = User::factory()->create();
    $permission = Permission::factory()->create(['name' => 'admin']);
    $user->permissions()->attach($permission);

    (new \App\Actions\Permissions\CacheUserPermissions())->execute($user);

    $this->actingAs($user)
         ->get('/dashboard')
         ->assertOk();
});
```

---

## 📌 Requisitos

- PHP >= 8.1
- Composer
- Node.js + NPM
- MySQL ou PostgreSQL
- Redis

---

## 📚 Referências

- [Laravel Documentation](https://laravel.com/docs)
- [Livewire Docs](https://livewire.laravel.com/)
- [Laravel Breeze](https://laravel.com/docs/starter-kits#laravel-breeze)
- [Pest PHP](https://pestphp.com/)
- [Redis](https://redis.io/)

---
