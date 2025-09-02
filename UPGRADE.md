# UPGRADE FROM 1.x TO 2.0

### Plugin configuration namespace

The plugin configuration namespace has changed in the `config/config.yaml` file:

**Before (1.x):**
```yaml
monsieurbiz_sylius_advanced_option:
    renderers:
```

**After (2.0):**
```yaml
monsieur_biz_sylius_advanced_option:
    renderers:
```

**Action required:** Update configuration files to use the new namespace `monsieur_biz_sylius_advanced_option` instead of `monsieurbiz_sylius_advanced_option`.


### Translation domain changes

The translation domain has been updated in both English and French translation files:

**Before (1.x):**
```yaml
# translations/validators.en.yaml
monsieurbiz_advancedoption:
    incorrect_image: 'This file format is not allowed. Please use PNG or JPG files.'

# translations/validators.fr.yaml
monsieurbiz_advancedoption:
    incorrect_image: 'Type de fichier non autorisé. Veuillez utiliser une image PNG ou JPG.'
```

**After (2.0):**
```yaml
# translations/validators.en.yaml
monsieurbiz_advanced_option:
    incorrect_image: 'This file format is not allowed. Please use PNG or JPG files.'

# translations/validators.fr.yaml
monsieurbiz_advanced_option:
    incorrect_image: 'Type de fichier non autorisé. Veuillez utiliser une image PNG ou JPG.'
```

### Summary of breaking changes

1. **Configuration namespace:** `monsieurbiz_sylius_advanced_option` → `monsieur_biz_sylius_advanced_option`
2. **Translation domain:** `monsieurbiz_advancedoption` → `monsieurbiz_advanced_option`

These changes improve consistency and follow naming conventions more closely.
