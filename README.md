# TwilioSMSender

## Default Tag

**##link##** => replace if not empty, leave empty if u dont use it<br>
**##randip##** => Random IP<br>
**##randcountry##** => Random Country<br>
**##randos##** => Random OS<br>
**##device##** => Random Device<br>
**##date_1##** => Format: Wed, July 22, 2020 3:01 PM<br>
**##date_2##** => Format: Wed, July 22, 2020<br>
**##date_3##** => Format: July 22, 2020 3:03 PM<br>
##date_4## => Format: July 22, 2020<br>

## Random Tag
Format: ##_w1_\__w2_\__w3_##<br>
Usage: 
```
 ##text_upp_6##
```

### w1
**text** => a-z<br>
**number** => 0-9<br>
**mix** => a-z0-9<br>

### w2
**upp** => Upper<br>
**low** => Lower<br>
**mix** => Upper - Lower<br>

### w3
**Length** => default 12<br>

## Custom Tag  
Usage: 
```
 ##custom_[ur_custom_tag_name]##
```

## List

**remove_dupp** => auto remove dupplicate list<br>
**format_country** => add country number code on the first<br>
**country_code** => country code<br>

if your number look like
```
1231231234
```
it will be
```
+1 1231231234
```

## Sending
**send** => how much list will be send<br>
**sleep** => long sleep in second every list will be send<br>
**rotateapi** => mode: 'send' or 'sleep' | API will rotate every 'send' or 'sleep'<br>
