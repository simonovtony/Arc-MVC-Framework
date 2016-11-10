CREATE DATABASE IF NOT EXISTS `project_local`;

USE `project_local`;

CREATE TABLE IF NOT EXISTS `blogs` (
  `id` INT(10) UNSIGNED AUTO_INCREMENT NOT NULL,
  `title` VARCHAR(255) NOT NULL,
  `url` VARCHAR(255) NOT NULL,
  `content` TEXT NOT NULL,
  `author` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
  PRIMARY KEY (`id`)
) ENGINE InnoDB;

CREATE TABLE IF NOT EXISTS `comments` (
  `id` INT(10) UNSIGNED AUTO_INCREMENT NOT NULL,
  `blog_id` INT(10) UNSIGNED,
  `name` VARCHAR(255) NOT NULL,
  `text` TEXT NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
  PRIMARY KEY (`id`),
  FOREIGN KEY (`blog_id`) REFERENCES `blogs`(`id`)
) ENGINE InnoDB;

# BLOGS

INSERT INTO `blogs` (`id`, `title`, `url`, `content`, `author`, `created_at`, `updated_at`)
VALUES (1, 'Pervaia statya', 'pervaia-statya-10-11-2016',
'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sollicitudin laoreet efficitur. Curabitur iaculis urna quis massa iaculis pellentesque. Maecenas euismod scelerisque mollis. Nulla pulvinar eros at ligula viverra, quis luctus diam rhoncus. Vivamus vehicula neque diam, non finibus nisl tempor et. Nullam pulvinar nulla eu nisi mollis, at laoreet libero fringilla. Pellentesque egestas, sapien quis posuere convallis, ligula urna fringilla nunc, a vestibulum nulla sapien dignissim nibh. Duis eleifend faucibus tincidunt. Curabitur ut pretium arcu, vitae facilisis nunc.
Etiam porta et dui nec laoreet. Duis quis porttitor justo, vel finibus est. Etiam leo odio, tempor vel iaculis sit amet, maximus in enim. Quisque a turpis nunc. Fusce sit amet ex ac felis dictum ultrices. Sed quis nulla at magna pharetra fringilla. Ut ultrices efficitur iaculis. Vestibulum eget felis eu quam sollicitudin venenatis ut et ante. Interdum et malesuada fames ac ante ipsum primis in faucibus. Phasellus eros ex, lacinia sit amet neque sit amet, blandit pulvinar purus. Maecenas placerat, magna a feugiat luctus, risus urna fringilla lacus, at fringilla felis eros id velit. Phasellus vel aliquam dui, id lobortis lacus.
Sed euismod massa blandit ligula eleifend, ac viverra libero rhoncus. Proin aliquet augue vel mi consectetur gravida. Ut ac lacus eget dolor feugiat rhoncus non dapibus metus. Aliquam erat volutpat. Interdum et malesuada fames ac ante ipsum primis in faucibus. Duis nec turpis dignissim, pulvinar orci sit amet, gravida lectus. Mauris accumsan quam orci, ut suscipit tellus sollicitudin ac. Nunc elit diam, ullamcorper ultrices rutrum et, mollis tempor sem. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.',
'user 1', CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP());

INSERT INTO `blogs` (`id`, `title`, `url`, `content`, `author`, `created_at`, `updated_at`)
VALUES (2, 'Vtoraia statia', 'vtoraia-statya-10-11-2016',
'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sollicitudin laoreet efficitur. Curabitur iaculis urna quis massa iaculis pellentesque. Maecenas euismod scelerisque mollis. Nulla pulvinar eros at ligula viverra, quis luctus diam rhoncus. Vivamus vehicula neque diam, non finibus nisl tempor et. Nullam pulvinar nulla eu nisi mollis, at laoreet libero fringilla. Pellentesque egestas, sapien quis posuere convallis, ligula urna fringilla nunc, a vestibulum nulla sapien dignissim nibh. Duis eleifend faucibus tincidunt. Curabitur ut pretium arcu, vitae facilisis nunc.
Etiam porta et dui nec laoreet. Duis quis porttitor justo, vel finibus est. Etiam leo odio, tempor vel iaculis sit amet, maximus in enim. Quisque a turpis nunc. Fusce sit amet ex ac felis dictum ultrices. Sed quis nulla at magna pharetra fringilla. Ut ultrices efficitur iaculis. Vestibulum eget felis eu quam sollicitudin venenatis ut et ante. Interdum et malesuada fames ac ante ipsum primis in faucibus. Phasellus eros ex, lacinia sit amet neque sit amet, blandit pulvinar purus. Maecenas placerat, magna a feugiat luctus, risus urna fringilla lacus, at fringilla felis eros id velit. Phasellus vel aliquam dui, id lobortis lacus.
Sed euismod massa blandit ligula eleifend, ac viverra libero rhoncus. Proin aliquet augue vel mi consectetur gravida. Ut ac lacus eget dolor feugiat rhoncus non dapibus metus. Aliquam erat volutpat. Interdum et malesuada fames ac ante ipsum primis in faucibus. Duis nec turpis dignissim, pulvinar orci sit amet, gravida lectus. Mauris accumsan quam orci, ut suscipit tellus sollicitudin ac. Nunc elit diam, ullamcorper ultrices rutrum et, mollis tempor sem. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.',
'user 2', CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP());

# COMMENTS

INSERT INTO `comments` (`id`, `blog_id`, `name`, `text`, `created_at`, `updated_at`)
VALUES (1, 1, 'user 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP());

INSERT INTO `comments` (`id`, `blog_id`, `name`, `text`, `created_at`, `updated_at`)
VALUES (2, 1, 'user 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP());