<?php 
class Item {
    private int $id;

    public function __construct(
        private string $nome,
        private string $imagem
    ){}

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function getImagem(): string {
        return $this->imagem;
    }

    public function save(): bool {
        $conexao = new MySQL();

        $sql = "INSERT INTO items (nome, imagem) VALUES
            ('{$this->nome}', '{$this->imagem}')";

        return $conexao->executa($sql);
    }

    public static function get_votos(): array {
        $conexao = new MySQL();

        $sql = "SELECT nome, IFNULL(SUM(stars) / COUNT(*), 0) AS nota, COUNT(votos.stars) AS votos
            FROM votos
            RIGHT JOIN items ON items.id = votos.id_item
            GROUP BY items.id
            ORDER BY votos DESC";

        return $conexao->consulta($sql);
    }

    public static function sortear($id_user): ?array {
        $conexao = new MySQL();

        $sql = "SELECT * FROM items 
        WHERE id NOT IN (SELECT id_item FROM votos WHERE id_user = {$id_user})
        ORDER BY RAND() LIMIT 1";

        $resposta = $conexao->consulta($sql);

        if(count($resposta) > 0) {
            return array("id" => $resposta[0]['id'], "nome" => $resposta[0]['nome'], "imagem" => $resposta[0]['imagem']);
        }

        return null;
    }

    public static function avaliar(int $id_item, int $stars): bool {
        $conexao = new MySQL();

        $sql = "INSERT INTO votos (id_user, id_item, stars) VALUES
            ({$_SESSION['id']}, {$id_item}, {$stars})";

        return $conexao->executa($sql);
    }
}
?>