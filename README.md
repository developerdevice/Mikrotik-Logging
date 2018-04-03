# Mikrotik-Logging

Biblioteca PHP (open-source) - Mikrotik

## Versão

Mikrotik Logging é um projeto open-source, atualmente na versão 1.0.0Build - A meta do projeto é oferecer um serviço Logging ágil e aberto a comunidade. A biblioteca trabalha com Socket L3, DGRAM - Roda sob qualquer plataforma.

## Instalação

Para instalar a biblioteca é recomendado que você tenha o [Git](http://https://git-scm.com/downloads) instalado :+1:

`git clone https://github.com/developerdevice/Mikrotik-Logging.git`

Ou baixe direto na página do serviço https://github.com/developerdevice/Mikrotik-Logging (Clone or Download)

## Pré-requisitos

> A documentação foi feita a partir do servidor `lighttpd - apache server`

Por padrão o gerenciador dos pacotes (LAMP, XAMPP, WAMPP) baixam o arquivo de socket, para ativar a extensão, abra o arquivo `php.ini` e altere a linha **#extension=php_sockets.dll** para **extension=php_sockets.dll**

> A documentação foi feita a partir do PHP7+

## Configuração

A biblioteca está definida com alguns parâmetros por padrão, altere caso seja necessário.

Na pasta `yourfolder/bin` abra o arquivo auxiliar `server.php` onde há duas propriedades - caso não sejam definidas o valor padrão será alterado:

> O valor padrão de `listen` no arquivo server.php é 514 - valor padrão do Mikrotik

| Propriedade | Descrição | Valor padrão |
| :---         |     :---:      |          ---: |
| listen   | Porta onde o servidor responderá     | 9999   |
| bindomain    | Permite conexão apenas a um cliente definido      | 0.0.0.0 (all)      |

Para iniciar o serviço, abra um terminal e vá até a pasta onde você baixou a biblioteca, nele execute `php suaasta/Mikrotik-Logging/bin/server.php` - se retorna algo como `Waiting for data ...`, está tudo certo.

## Mikrotik Client

Para que o servidor receba os dados do Mikrotik é necessário efetuar algumas alterações simples na sua RouterBoard

em `System > Loggin > Rules` você precisa criar uma regra que solicitará ao nosso servidor, previamente configurado:

| Topics | Prefix | Action |
| :---         |     :---:      |          ---: |
| dns   |      | remote   |
| firewall    |     | remote     |

em `System > Loggin > Actions` altere a opção `remote` de acordo com os dados onde o servidor está rodando

Para que o serviço rode, é necessário apenas duas alterações no daemon `Remote Address` e `Remote Port`

Agora abra seu terminal, onde você iniciou o serviço, automaticamente você receberá logs `dns / firewall` em tempo real.

# Autoria e contribuições

O projeto Mikrotik Logging é de autoria de Mauro Alexandre (DeveloperDevice), no momento não há contribuintes ativos.

> Seja um contribuinte e ajude o projeto crescer a favor da comunidade.

