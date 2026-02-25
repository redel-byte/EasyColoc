<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invitation to join {{ $colocation->name }}</title>
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
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }
        .content {
            background: #f9f9f9;
            padding: 30px;
            border-radius: 0 0 10px 10px;
        }
        .button {
            display: inline-block;
            padding: 12px 24px;
            background: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin: 10px 5px;
            font-weight: bold;
        }
        .button-decline {
            background: #f44336;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            color: #666;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>🏠 EasyColoc Invitation</h1>
        <p>You're invited to join a colocation!</p>
    </div>
    
    <div class="content">
        <h2>Hello!</h2>
        
        <p>You've been invited to join <strong>{{ $colocation->name }}</strong> on EasyColoc!</p>
        
        <p>EasyColoc helps you and your housemates:</p>
        <ul>
            <li>📊 Track shared expenses</li>
            <li>💰 Calculate who owes what</li>
            <li>📧 Manage payments easily</li>
            <li>⭐ Build reputation through responsible sharing</li>
        </ul>
        
        <div style="text-align: center; margin: 30px 0;">
            <a href="{{ $acceptUrl }}" class="button">Accept Invitation</a>
            <a href="{{ $rejectUrl }}" class="button button-decline">Decline</a>
        </div>
        
        <p><strong>Note:</strong> This invitation expires on {{ $invitation->expires_at->format('F j, Y') }}.</p>
        
        <p>If you didn't expect this invitation, you can safely ignore this email.</p>
    </div>
    
    <div class="footer">
        <p>Best regards,<br>The EasyColoc Team</p>
        <p style="font-size: 12px; margin-top: 20px;">
            This is an automated message. Please do not reply to this email.
        </p>
    </div>
</body>
</html>
