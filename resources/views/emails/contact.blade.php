<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Nieuw contactbericht</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: #2563eb;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }
        .content {
            background: #f9fafb;
            padding: 20px;
            border: 1px solid #e5e7eb;
            border-top: none;
            border-radius: 0 0 8px 8px;
        }
        .field {
            margin-bottom: 16px;
        }
        .label {
            font-weight: bold;
            color: #374151;
        }
        .value {
            margin-top: 4px;
            padding: 10px;
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 4px;
        }
        .message-content {
            white-space: pre-wrap;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Nieuw contactbericht</h1>
        <p>Via het contactformulier van Opticalium</p>
    </div>
    
    <div class="content">
        <div class="field">
            <div class="label">Naam:</div>
            <div class="value">{{ $formData['name'] }}</div>
        </div>
        
        <div class="field">
            <div class="label">E-mailadres:</div>
            <div class="value">{{ $formData['email'] }}</div>
        </div>
        
        @if(!empty($formData['phone']))
        <div class="field">
            <div class="label">Telefoonnummer:</div>
            <div class="value">{{ $formData['phone'] }}</div>
        </div>
        @endif
        
        <div class="field">
            <div class="label">Onderwerp:</div>
            <div class="value">{{ $formData['subject'] }}</div>
        </div>
        
        <div class="field">
            <div class="label">Bericht:</div>
            <div class="value message-content">{{ $formData['message'] }}</div>
        </div>
    </div>
</body>
</html>
