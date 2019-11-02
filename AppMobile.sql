CREATE DATABASE db_appcrud;
USE db_appcrud;

CREATE TABLE tb_admin(
    cd_admin INT AUTO_INCREMENT,
    nm_admin VARCHAR(55) NOT NULL,
    ds_email VARCHAR(55) NOT NULL,
    CONSTRAINT EMAIL_USER_UNICO UNIQUE (ds_email),
    ds_senha VARCHAR(25) NOT NULL,
    dt_cadastro TIMESTAMP NOT NULL
    DEFAULT CURRENT_TIMESTAMP
    ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY(cd_admin)
);

CREATE TABLE tb_usuario(
    cd_usuario INT AUTO_INCREMENT,
    nm_usuario VARCHAR(55) NOT NULL,
    ds_email VARCHAR(55) NOT NULL,
    CONSTRAINT EMAIL_USER_UNICO UNIQUE (ds_email),
    ds_senha VARCHAR(25) NOT NULL,
    ds_bio_usuario LONGTEXT,
    ds_cidade VARCHAR(25),
    dt_nascimento DATE,
    dt_cadastro TIMESTAMP NOT NULL
    DEFAULT CURRENT_TIMESTAMP
    ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY(cd_usuario)
);

CREATE TABLE tb_amizade(
    cd_amizade INT AUTO_INCREMENT,
    id_amigo_solicitante INT NOT NULL,
    CONSTRAINT USER_SOLICITANTE_FK
    FOREIGN KEY (id_amigo_solicitante) REFERENCES
    tb_usuario(cd_usuario),
    id_amigo_solicitado INT NOT NULL,
    CONSTRAINT USER_SOLICITADO_FK
    FOREIGN KEY (id_amigo_solicitado) REFERENCES
    tb_usuario(cd_usuario),
    dt_confirmacao DATETIME,
    ic_confirmacao CHAR(1) NOT NULL,
    PRIMARY KEY(cd_amizade)
);

CREATE TABLE tb_mensagem(
    cd_mensagem INT AUTO_INCREMENT,
    ds_mensagem LONGTEXT,
    id_destino INT NOT NULL,
    CONSTRAINT USER_DESTINO_FK
    FOREIGN KEY (id_destino) REFERENCES
    tb_usuario(cd_usuario),
    id_origem INT NOT NULL,
    CONSTRAINT USER_ORIGEM_FK
    FOREIGN KEY (id_origem) REFERENCES
    tb_usuario(cd_usuario),
    dt_mensagem TIMESTAMP NOT NULL
    DEFAULT CURRENT_TIMESTAMP
    ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY(cd_mensagem)
);

CREATE TABLE tb_foto(
    cd_foto INT AUTO_INCREMENT,
    nm_foto VARCHAR(45),
    ds_url_foto VARCHAR(128) NOT NULL,
    id_usuario INT NOT NULL,
    CONSTRAINT USER_FOTO_FK
    FOREIGN KEY (id_usuario) REFERENCES
    tb_usuario(cd_usuario),
    dt_foto TIMESTAMP NOT NULL
    DEFAULT CURRENT_TIMESTAMP
    ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY(cd_foto)
);

CREATE TABLE tb_foto_perfil(
    cd_foto_perfil INT AUTO_INCREMENT,
    id_foto INT NOT NULL,
    CONSTRAINT URL_FOTO_FK
    FOREIGN KEY (id_foto) REFERENCES
    tb_foto(cd_foto),
    id_usuario INT NOT NULL,
    CONSTRAINT USER_FOTOPERFIL_FK
    FOREIGN KEY (id_usuario) REFERENCES
    tb_usuario(cd_usuario),
    PRIMARY KEY(cd_foto_perfil)
);