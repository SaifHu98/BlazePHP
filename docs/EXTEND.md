# Extending BlazePHP

## 1. Plugins
Register plugins in runtime via:
```php
PluginManager::register('custom_hook', function() {
  return 'Custom logic';
});
```

## 2. Live Code Execution
Test snippets live using:
```php
Playground::run('<?php echo "Hello"; ?>');
```

## 3. AI Assistant
Get development suggestions using:
```php
Assistant::suggest('api/performance');
```

## 4. Contributions
Fork, commit, and push your feature branches.
Submit pull requests and documentation.
